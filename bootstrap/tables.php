<?php

// Products SQL Query
$products = "CREATE TABLE IF NOT EXISTS products(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    cost float(100, 2) NOT NULL,
    description longtext NOT NULL,
    stock INT(5) NOT NULL DEFAULT 0,
    published DATETIME
);";

if ($DB->query('SELECT 1 FROM `products`;') == false) 
{
    if ($DB->query($products) !== TRUE) 
    {
        var_dump('Products table was NOT created');
    }
}