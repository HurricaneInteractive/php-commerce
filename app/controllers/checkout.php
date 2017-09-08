<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

\Stripe\Stripe::setApiKey("<key>");

class Checkout extends Controller
{
    public function index()
    {
        $this->view('checkout/index');
    }

    public function processPayment()
    {
        
    }
}