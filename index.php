<?php require_once('init.php'); ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PHP Commerce</title>
    </head>
    <body>
        <?php
            // Dump the server status
            $status = $DB->stat; 
            var_dump($status);
        ?>
    </body>
</html>