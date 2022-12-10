<?php
class ProductController extends Controller
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
        echo 'Product-sayHi';
    }

    public function show($id)
    {
        $categories = $this->categoryModel->getCategories();
        $product = $this->productModel->getProduct($id);
        $StringSize = $product['Size'];
        $this->view(
            'main-layout',
            [
                'page' => 'products/showProduct',
                'pageName' => $product['Name'],
                'categories' => $categories,
                'product' => $product
            ]
        );
    }
}
