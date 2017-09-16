<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require '../app/views/header.php';

    $products = $data['products'];
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">Welcome to PHP Commerce</h1>
            <p class="lead">The is a prototype e-commerce site built with PHP and Stripe</p>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="row">
                    <nav class="w-100 navbar navbar-light justify-content-between">
                        <a class="navbar-brand">Browse Products (<?php echo count($products); ?>)</a>
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                </div>
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
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $name; ?></h4>
                                        <p class="card-text"><?php echo $desc ?></p>
                                        <a data-id="<?php echo $id; ?>" href="/add-to-cart" id="add-to-cart" class="card-link">Add to cart</a>
                                        <a href="/home/product?id=<?php echo $id; ?>" class="card-link">View</a>
                                    </div>
                                </div>
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