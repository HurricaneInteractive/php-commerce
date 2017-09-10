<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

\Stripe\Stripe::setApiKey("pk_test_WIRYtSewtY7gFWIHZG7zNcXk");

class Checkout extends Controller
{
    public function index()
    {
        $this->view('checkout/index');
    }

    public function processPayment()
    {
        $customer = \Stripe\Customer::retrieve("cus_BN58HSrvDCU4sf");
        echo json_encode(array(
            'customer' => $customer
        ));
        echo json_encode(array('customer' => $customer));
    }
}