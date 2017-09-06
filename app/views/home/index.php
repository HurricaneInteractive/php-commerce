<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require '../app/views/header.php';
?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Browse Products</h1>
            </div>
            <?php foreach($data['products'] as $product): ?>

                <div class="col-sm-4 product">
                    <h2><?php echo $product['name']; ?></h2>
                    <p>
                        <?php echo $product['description']; ?>
                    </p>
                    <small style="display: block;">$<?php echo $product['cost']; ?></small>
                    <a data-id="<?php echo $product['id']; ?>" href="/add-to-cart/<?php echo $product['id']; ?>" class="btn btn-primary">Add to cart</a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

<?php 
    require '../app/views/footer.php';
?>