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

        $categories = $this->categoryModel->getCategories();
        $products = $this->productModel->getProducts();
        $this->view(
            'main-layout',
            [
                'page' => 'products/index',
                'pageName' => 'Shop bán giày',
                'categories' => $categories,
                'products' => $products
            ]
        );
    }

    public function show($id)
    {
        $categories = $this->categoryModel->getCategories();
        $product = $this->productModel->getProduct($id);
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


    public function ByCate($id)
    {
        $products = $this->productModel->productByCate($id);
        $category = $this->categoryModel->getCategory($id);
        $categories = $this->categoryModel->getCategories();


        $this->view(
            'main-layout',
            [
                'page' => 'products/byCateID',
                'pageName' => 'Danh mục',
                'categoryTitle' => $category,
                'products' => $products,
                'categories' => $categories
            ]
        );
    }
}
