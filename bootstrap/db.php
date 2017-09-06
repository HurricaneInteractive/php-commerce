<?php

// Create a DB class which extends the mysqli PHP class
class DB extends mysqli
{
    public function __construct($host, $user, $pass, $db) {
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

    public function formatResults($results) {
        for ($set = array (); $row = $results->fetch_assoc(); $set[] = $row);
        $results->free();
        return $set;
    }
}