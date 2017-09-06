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
            $g = $DB->getAllProducts();
            var_dump($g);
        ?>
        <div>
            <?php 
                if (!empty($g)) {
                    foreach($g as $product) {
                        ?>
                            <div>
                                <h3><?php echo $product['name']; ?></h3>
                                <p><?php echo $product['description']; ?></p>
                                <small><?php echo $product['cost']; ?></small>
                                <a href="/add-to-cart/<?php echo $product['id']; ?>">Add to cart</a>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </body>
</html>