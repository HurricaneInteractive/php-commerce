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

    /**
    *   Returns all products from the database
    *   @return array
    */
    public function getAllProducts() {
        $results = $this->query("SELECT * FROM products");
        $set = $this->formatResults($results);
        return $set;
    }

    /**
    *   Return a single product
    *   @param int $id
    *   @return object Product
    */
    public function getProduct($id) {
        $results = $this->query("SELECT * FROM products WHERE id = " . $id . ";");
        $set = $this->formatResults($results);
        return new Product($set[0]);
    }
    
    /**
    *   Gets all the cart items
    */
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

    /**
    *   Returns the database entries as an array
    *   @param $results
    *   @return array $set
    */
    public function formatResults($results) {
        for ($set = array (); $row = $results->fetch_assoc(); $set[] = $row);
        $results->free();
        return $set;
    }
}