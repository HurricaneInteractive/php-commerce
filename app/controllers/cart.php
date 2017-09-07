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
        $key = array_search($id, array_column($_SESSION['cart'], 'id'));
        
        if ($key === false) {
            array_push($_SESSION['cart'], array( 'id' => $id, 'quantity' => 1 ));
        }
        else {
            $_SESSION['cart'][$key]['quantity'] += 1;
        }
        
        echo json_encode(array(
            'success' => 'true',
            'session' => count($_SESSION['cart']),
            'key' => $key,
            'cart' => $_SESSION['cart']
        ));
    }
}