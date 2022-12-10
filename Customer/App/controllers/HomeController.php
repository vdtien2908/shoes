<?php
class HomeController extends Controller
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
        $productHot = $this->productModel->getProductHot();
        $products = $this->productModel->getProducts();
        $this->view(
            'main-layout',
            [
                'page' => 'home/index',
                'pageName' => 'Shop bán giày',
                'categories' => $categories,
                'productHot' => $productHot,
                'products' => $products
            ]
        );
    }

    public function show($id)
    {
    }
}
