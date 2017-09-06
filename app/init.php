<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    require_once '../config.php';
    require_once 'database.php';
    $DB = new DB(HOST, USERNAME, PASSWORD, DB_NAME);
    $GLOBALS['DB'] = $DB;

    require_once 'core/App.php';
    require_once 'core/Controller.php';