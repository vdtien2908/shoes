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

        if ($name && $email && $pass && $pass_r && $birthday &&  $address && $phoneNumber) {
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
