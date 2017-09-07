<?php

require_once '../app/models/product.php';

// Create a DB class which extends the mysqli PHP class
class DB extends mysqli
{
    public function __construct($host = HOST, $user = USERNAME, $pass = PASSWORD, $db = DB_NAME) {
        // Initialize the connection to the server and return any errors
        parent::init();

        if (!parent::options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) {
            die('Setting MYSQLI_INIT_COMMAND failed');
        }

        if (!parent::options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
            die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
        }

        if (!parent::real_connect($host, $user, $pass, $db)) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }

    public function getAllProducts() {
        $results = $this->query("SELECT * FROM products");
        $set = $this->formatResults($results);
        return $set;
    }

    public function getProduct($id) {
        $results = $this->query("SELECT * FROM products WHERE id = " . $id . ";");
        $set = $this->formatResults($results);
        return $set[0];
    }
    
    public function getCartItems() {
        $allID = array();
        foreach($_SESSION['cart'] as $item) {
            $allID[] = $item['id'];
        }

        $ids = implode(',', $allID);
        $results = $this->query("SELECT * FROM products WHERE id IN (" . $ids . ");");
        if ($results != false) {
            $set = $this->formatResults($results);
            $cartItems = array();

            foreach($set as $prod) {
                $product = new Product($prod);
                $key = array_search($product->get_id(), array_column($_SESSION['cart'], 'id'));
                $quantity = $_SESSION['cart'][$key]['quantity'];
                $product->set_cart_quantity($quantity);
                $cartItems[] = $product;
            }

            return $cartItems;
        }
        return array();
    }

    public function formatResults($results) {
        for ($set = array (); $row = $results->fetch_assoc(); $set[] = $row);
        $results->free();
        return $set;
    }
}