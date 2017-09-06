<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Cart extends Controller
{
    public function index()
    {
        $cart = $GLOBALS['DB']->getCartItems();

        $this->view('cart/index', [
            'cart' => $cart
        ]);
    }

    public function add()
    {   
        $id = $_POST['id'];
        $_SESSION['cart'][] = $id;
        
        echo json_encode(array(
            'success' => 'true',
            'session' => count($_SESSION['cart'])
        ));
    }
}