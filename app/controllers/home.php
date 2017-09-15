<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once '../app/models/product.php';

class Home extends Controller
{
    public function index()
    {
        $allProducts = array();
        $products = $GLOBALS['DB']->getAllProducts();

        foreach($products as $product) {
            $allProducts[] = new Product($product);
        }

        $this->view('home/index', [
            'products' => $allProducts
        ]);
    }

    public function product()
    {
        $id = $_GET['id'];
        mysql_real_escape_string($id);
        $product = $GLOBALS['DB']->getProduct(intval($id));

        $this->view('home/product', [
            'product' => $product
        ]);
    }
}