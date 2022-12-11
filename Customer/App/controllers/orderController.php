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
    }
}
