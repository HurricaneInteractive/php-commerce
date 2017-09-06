<?php

    session_start();
    $_SESSION['cart'] = array('2', '1');

    require_once '../config.php';
    require_once 'database.php';
    $DB = new DB(HOST, USERNAME, PASSWORD, DB_NAME);
    $GLOBALS['DB'] = $DB;

    require_once 'core/App.php';
    require_once 'core/Controller.php';