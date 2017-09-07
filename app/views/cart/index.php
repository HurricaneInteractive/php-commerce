<?php require '../app/views/header.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead class="table-inverse">
                        <tr class="bg-primary">
                            <th>#</th>
                            <th>Name</th>
                            <th>Price ($)</th>
                            <th>Quantity</th>
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
                            </tr>

                        <?php $count++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require '../app/views/footer.php'; ?>