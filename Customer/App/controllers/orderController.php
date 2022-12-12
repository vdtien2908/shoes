<?php
class OrderController extends BaseController
{
    private $productModel;
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = $this->model('categoryModel');
        $this->productModel = $this->model('productModel');
    }

    public function sayHi()
    {
        $categories = $this->categoryModel->getCategories();
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
