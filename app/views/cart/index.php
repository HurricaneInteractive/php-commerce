<?php require '../app/views/header.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <h2>Chart</h2>
            </div>
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead class="table-inverse">
                        <tr class="bg-primary">
                            <th style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Price ($)</th>
                            <th>Quantity</th>
                            <th style="width: 100px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $count = 1; 
                            foreach($data['cart'] as $product):
                                $name = $product->get_name();
                                $cost = $product->get_cost();
                                $quantity = $product->get_cart_quantity();
                        ?>

                            <tr>
                                <th><?php echo $count; ?></th>
                                <th><?php echo $name; ?></th>
                                <th><?php echo $cost; ?></th>
                                <th><?php echo $quantity; ?></th>
                                <th><a href="/home/product/?id=<?php echo $product->get_id(); ?>">View</a></th>
                            </tr>

                        <?php $count++; endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if (count($data['cart']) > 0): ?>
                <div class="col-sm-12">
                    <a href="/checkout" class="btn btn-primary">Proceed to Checkout</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php require '../app/views/footer.php'; ?>