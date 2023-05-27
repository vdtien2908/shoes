<?php
class AuthController extends BaseController
{
    private $categoryModel;
    private $customerModel;

    public function __construct()
    {
        $this->categoryModel = $this->model('categoryModel');
        $this->customerModel = $this->model('customerModel');
    }

    public function sayHi()
    {
        $categories = $this->categoryModel->getCategories();
        $this->view(
            'main-layout',
            [
                'page' => 'auth/login',
                'pageName' => 'Đăng nhập',
                'categories' => $categories
            ]
        );
    }

    public function checkEmail()
    {
        $email = $_POST['email'];
        $customer = $this->customerModel->findEmail($email); //Tìm email

        if ($customer) {
            $response = array('status' => true, 'message' => 'Email đã tồn tại');
        } else {
            $response = array('status' => false, 'message' => 'Email không tồn tại');
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }


    public function signIn()
    {
        $email = $_POST['username'];
        $pass = $_POST['password'];
        $customer = $this->customerModel->findEmail($email); //Tìm email

        if ($customer) { // Nếu có email
            if ($pass == $customer['Password']) { //Kiểm tra password
                $_SESSION['customer'] = $customer; // Tạo session_login
                header('Location:../home');
            } else {
                $err = 'Mật khẩu không chính xác';
                echo $err;
            }
        } else {
            $err = 'Email không tồn tại';
            echo $err;
        }
    }

    public function register()
    {
        $categories = $this->categoryModel->getCategories();
        $this->view(
            'main-layout',
            [
                'page' => 'auth/register',
                'pageName' => 'Đăng ký',
                'categories' => $categories
            ]
        );
    }

    public function create()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass_r = $_POST['pass_r'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber'];

        $customer = $this->customerModel->findEmail($email); //Tìm email
        if ($customer) {
            echo "Email đã tồn tại";
        } else {
            if ($name || $email || $pass || $pass_r || $birthday ||  $address || $phoneNumber) {
                $data = [
                    'Name' => $name,
                    'Email' => $email,
                    'Password' => $pass,
                    'Birthday' => $birthday,
                    'Address' => $address,
                    'PhoneNumber' => $phoneNumber
                ];

                if ($pass == $pass_r) {
                    $this->customerModel->createCustomer($data);
                    header("location:sayHi");
                } else {
                    header("location:register");
                }
            } else {
                header("location:register");
            }
        }
    }

    public function logout()
    {
        if ($_SESSION['customer']) {
            unset($_SESSION['customer']);
            header('Location: ../home');
        }
    }
}
