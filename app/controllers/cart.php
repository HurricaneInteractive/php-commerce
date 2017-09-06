<?php

class Cart extends Controller
{
    public function index()
    {
        $cart = $GLOBALS['DB']->getCartItems();

        $this->view('cart/index', [
            'cart' => $cart
        ]);
    }
}