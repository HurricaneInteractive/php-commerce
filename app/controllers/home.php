<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require '../app/models/product.php';

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
}