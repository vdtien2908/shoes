<?php
class OrderController extends BaseController
{
    private $productModel;
    private $categoryModel;
    private $orderModel;
    private $orderDetailModel;

    public function __construct()
    {
        $this->categoryModel = $this->model('categoryModel');
        $this->productModel = $this->model('productModel');
        $this->orderModel = $this->model('orderModel');
        $this->orderDetailModel = $this->model('orderDetailModel');
    }

    public function sayHi()
    {
        $categories = $this->categoryModel->getCategories();
        $this->view(
            'main-layout',
            [
                'page' => 'orders/index',
                'categories' => $categories
            ]
        );
    }

    public function cart()
    {
        $categories = $this->categoryModel->getCategories();
        $this->view(
            'main-layout',
            [
                'page' => 'orders/cart',
                'categories' => $categories
            ]
        );
    }

    public function addToCart($id)
    {
        if (isset($_SESSION['customer'])) {
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            $name = $_POST['name'];
            $promotionPrice = $_POST['promotionPrice'];
            $size = $_POST['size'];
            $img = $_POST['img'];
            $quantity = $_POST['quantity'];
            $flag = 0;

            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]['ID'] == $id && $_SESSION['cart'][$i]['Size'] == $size) {
                    $flag = 1;
                    $quantityNew = $quantity + $_SESSION['cart'][$i]['Quantity'];
                    $_SESSION['cart'][$i]['Quantity'] = $quantityNew;
                    break;
                }
            }

            if ($flag == 0) {
                $product = [
                    'ID' => $id,
                    'Name' => $name,
                    'PromotionPrice' => $promotionPrice,
                    'Size' => $size,
                    'Img' => $img,
                    'Quantity' => $quantity
                ];
                $_SESSION['cart'][] = $product;
            }

            header("location:../../product/show/${id}");
        } else {
            header("location:../auth");
        }
    }

    public function deleteCart($id)
    {

        unset($_SESSION['cart'][$id]);
        header('Location: ../cart');
    }

    public function pay()
    {
        $categories = $this->categoryModel->getCategories();
        $this->view(
            'main-layout',
            [
                'page' => 'orders/pay',
                'categories' => $categories
            ]
        );
    }

    public function thank()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $value) {
            $total += $value['PromotionPrice'] * $value['Quantity'];
        }
        $categories = $this->categoryModel->getCategories();
        $nameReceive = $_POST['nameReceive'];
        $phoneReceive = $_POST['phoneReceive'];
        $addressReceive = $_POST['addressReceive'];
        $note = $_POST['note'];
        $totalNew = $total;
        $customerID = $_SESSION['customer']['ID'];

        if ($nameReceive && $phoneReceive && $addressReceive && $note) {
            $data = [
                'NameReceive' => $nameReceive,
                'PhoneReceive' => $phoneReceive,
                'AddressReceive' => $addressReceive,
                'Note' => $note,
                'Total' => $totalNew,
                'CustomerID' => $customerID
            ];
            $order_id =  $this->orderModel->createOrder($data);
            $insertString = '';
            foreach ($_SESSION['cart'] as $key => $value) {
                $insertString .= "(${value['Quantity']}, ${value['PromotionPrice']}, ${value['Size']},${value['ID']}, ${order_id})";
                if ($key != count($_SESSION['cart']) - 1) {
                    $insertString .= ',';
                }
            }

            $sql = "INSERT INTO orderDetails(Quantity, Price, Size, ProductID, OrderID)
                    Value$insertString";
            $this->orderDetailModel->createOrderDetail($sql);
            unset($_SESSION['cart']);


            $this->view(
                'main-layout',
                [
                    'page' => 'orders/thank',
                    'categories' => $categories
                ]
            );
        } else {
            header("location:pay");
        }
    }
}
