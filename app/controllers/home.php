<?php

class Home extends Controller
{
    public function index()
    {
        $allProducts = $GLOBALS['DB']->getAllProducts();

        $this->view('home/index', [
            'products' => $allProducts
        ]);
    }
}