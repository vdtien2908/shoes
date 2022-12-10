<?php
class AuthController extends BaseController
{
    private $AdminModel;
    public function __construct()
    {
        $this->AdminModel = $this->model('AdminModel');
    }

    public function sayHi()
    {
        $this->view('auth-layout', ['page' => 'auth/login']);
    }

    public function signIn()
    {
        $email = $_POST['username'];
        $pass = $_POST['password'];
        $result = $this->AdminModel->findEmail($email); //Tìm email
        if ($result) { // Nếu có email
            if ($pass == $result['Password']) { //Kiểm tra password
                $_SESSION['login'] = $result; // Tạo session_login
                header('Location: home');
            } else {
                $err = 'Mật khẩu không chính xác';
                echo $err;
            }
        } else {
            $err = 'Email không tồn tại';
            echo $err;
        }
    }

    public function logout()
    {
        if ($_SESSION['login']) {
            unset($_SESSION['login']);
            header('Location: ../auth/login');
        }
    }
}
