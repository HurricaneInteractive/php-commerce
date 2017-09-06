<?php

    // Gets the Server information
    require('config.php');

    // Creates a DB connection to use
    require('bootstrap/db.php');
    $DB = new DB(HOST, USERNAME, PASSWORD, DB_NAME);

    // Create Tables for DB
    require('bootstrap/tables.php');