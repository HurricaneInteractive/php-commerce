<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

\Stripe\Stripe::setApiKey("sk_test_acwyr1hxM1YkzwEWToHTsmtV");

class Checkout extends Controller
{
    public function index()
    {
        $cart = $GLOBALS['DB']->getCartItems();
        
        $this->view('checkout/index', [
            'cart' => $cart,
            'scripts' => ['stripe']
        ]);
    }

    public function processPayment()
    {
        $customer = \Stripe\Customer::retrieve("cus_BN58HSrvDCU4sf");
        $token = \Stripe\Token::create(array(
            "card" => array(
                "number" => $_POST['card_number'],
                "exp_month" => $_POST['expiry_month'],
                "exp_year" => "20" . $_POST['expiry_year'],
                "cvc" => $_POST['cvc']
            )
        ));
        echo json_encode(array(
            'customer' => $customer,
            'post' => $_POST,
            'token' => $token
        ));
        // echo json_encode(array('customer' => $customer));
    }
}