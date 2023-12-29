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
        $orders = $this->orderModel->getOrders($_SESSION['customer']['ID']);
        $this->view(
            'main-layout',
            [
                'pageName' => 'Lịch sử mua hàng',
                'page' => 'orders/index',
                'categories' => $categories,
                'orders' => $orders
            ]
        );
    }

    public function cart()
    {
        $categories = $this->categoryModel->getCategories();
        $this->view(
            'main-layout',
            [
                'pageName' => 'Giỏ hàng',
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
                'pageName' => 'Thanh toán',
                'page' => 'orders/pay',
                'categories' => $categories
            ]
        );
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function checkOut()
    { {
            $total = 0;
            foreach ($_SESSION['cart'] as $value) {
                $total += $value['PromotionPrice'] * $value['Quantity'];
            }
            $nameReceive = $_POST['nameReceive'];
            $phoneReceive = $_POST['phoneReceive'];
            $addressReceive = $_POST['addressReceive'];
            $note = $_POST['note'];
            $totalNew = $total;
            $customerID = $_SESSION['customer']['ID'];
            $payment = $_POST['payment'];

            if ($nameReceive && $phoneReceive && $addressReceive && $note &&  $payment) {
                if ($payment == 'COD') {
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
                    header("location:thank");
                } else {
                    $data = [
                        'NameReceive' => $nameReceive,
                        'PhoneReceive' => $phoneReceive,
                        'AddressReceive' => $addressReceive,
                        'Note' => $note,
                        'payment' => 1,
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

                    // Payment ----
                    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                    $partnerCode = 'MOMOBKUN20180529';
                    $accessKey = 'klm05TvNBzhg7h7j';
                    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

                    $orderInfo = "Thanh toán qua MoMo";
                    $amount = $totalNew;
                    $orderId =  time() . "";
                    $redirectUrl = "http://localhost/shoes/customer/order/thank";
                    $ipnUrl = "http://localhost/shoes/customer/order/thank";
                    $extraData = "";

                    $partnerCode = $partnerCode;
                    $accessKey =   $accessKey;
                    $serectkey =   $secretKey;
                    $orderId = $orderId;
                    $orderInfo =  $orderInfo;
                    $amount = $amount;
                    $ipnUrl = $ipnUrl;
                    $redirectUrl = $redirectUrl;
                    $extraData = $extraData;

                    $requestId = time() . "";
                    $requestType = "payWithATM";
                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $serectkey);
                    $data = array(
                        'partnerCode' => $partnerCode,
                        'partnerName' => "Test",
                        "storeId" => "MomoTestStore",
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'redirectUrl' => $redirectUrl,
                        'ipnUrl' => $ipnUrl,
                        'lang' => 'vi',
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature
                    );
                    $result = $this->execPostRequest($endpoint, json_encode($data));
                    $jsonResult = json_decode($result, true);  // decode json
                    var_dump($jsonResult);

                    header('Location: ' . $jsonResult[$payment]);
                }
            } else {
                header('Location: pay');
            }
        }
    }

    public function thank()
    {
        $categories = $this->categoryModel->getCategories();

        $this->view(
            'main-layout',
            [
                'page' => 'orders/thank',
                'categories' => $categories
            ]
        );
    }
}
