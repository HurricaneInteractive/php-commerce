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
                        <?php $count = 1; foreach($data['cart'] as $product): ?>

                            <tr>
                                <th><?php echo $count; ?></th>
                                <th><?php echo $product['name']; ?></th>
                                <th><?php echo $product['cost']; ?></th>
                                <th>1</th>
                            </tr>

                        <?php $count++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require '../app/views/footer.php'; ?>