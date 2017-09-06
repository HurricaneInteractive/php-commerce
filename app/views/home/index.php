<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require '../app/views/header.php';

    $products = $data['products'];
?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Browse Products</h1>
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
                                <a data-id="<?php echo $id ?>" href="/add-to-cart" class="btn btn-primary">Add to cart</a>
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