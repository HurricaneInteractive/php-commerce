<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require '../app/views/header.php';

    $products = $data['products'];
?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h1>Browse Products <small class="text-muted">Results (<?php echo count($products); ?>)</small></h1>
            </div>
            <?php
                if (!empty($products)) {
                    foreach($products as $product) 
                    {
                        $id = $product->get_id();
                        $name = $product->get_name();
                        $desc = $product->get_description();
                        $cost = $product->get_cost();
                        ?>
                            <div class="col-sm-4 product">
                                <h2><?php echo $name; ?></h2>
                                <p><?php echo $desc ?></p>
                                <small style="display: block;">$<?php echo $cost ?></small>
                                <a data-id="<?php echo $id; ?>" href="/add-to-cart" class="btn btn-primary">Add to cart</a>
                                <a href="/home/product?id=<?php echo $id; ?>" class="btn btn-link">View</a>
                            </div>
                        <?php
                    }
                }
            ?>
        </div>
    </div>

<?php 
    require '../app/views/footer.php';
?>