<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require '../app/views/header.php';

    $totalCost = NULL;
?>

<div class="container mt-5 checkout">
    <div class="row">
        <div class="col-sm-12">
            <h2>Checkout</h2>
        </div>
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead class="table-inverse">
                    <tr class="bg-primary">
                        <th style="width: 50px;">#</th>
                        <th>Name</th>
                        <th>Price ($)</th>
                        <th style="width: 190px;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $count = 1;
                        foreach($data['cart'] as $product):
                            $name = $product->get_name();
                            $cost = $product->get_cost();
                            $quantity = $product->get_cart_quantity();
                            $totalCost += (floatval($cost) * intval($quantity));
                    ?>

                        <tr>
                            <th><?php echo $count; ?></th>
                            <th><?php echo $name; ?></th>
                            <th><?php echo $cost; ?></th>
                            <th />
                        </tr>

                    <?php $count++; endforeach; ?>
                    <tr class="table-primary">
                        <th />
                        <th />
                        <th />
                        <th>Total: $<?php echo $totalCost; ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-sm-12">
            <form id="checkout_form">
                <div class="group">
                    <label>
                        <span>Name</span>
                        <input name="cardholder-name" class="field" placeholder="Jane Doe" />
                    </label>
                    <label>
                        <span>Phone</span>
                        <input class="field" placeholder="(123) 456-7890" type="tel" />
                    </label>
                </div>
                <div class="group">
                    <label>
                        <span>Card</span>
                        <div id="card-element" class="field"></div>
                    </label>
                </div>
                <button type="submit">Pay</button>
                <div class="outcome">
                    <div class="error" role="alert"></div>
                    <div class="success">
                        Success! Your Stripe token is <span class="token"></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    require '../app/views/footer.php';
?>