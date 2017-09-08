<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require '../app/views/header.php';
?>

<h1>CHeckout Page</h1>