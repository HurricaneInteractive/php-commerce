<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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