<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require '../app/views/header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <h2>Checkout</h2>
        </div>
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead class="table-inverse">
                    <tr class="bg-primary">
                        <th>#</th>
                        <th>Name</th>
                        <th>Price ($)</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-sm-12">
            <form action="/checkout/processPayment" method="POST" id="checkout_form">
                <input name="card-number" placeholder="424242424242" value="424242424242" />
                <input name="expiry-begin" value="9" />
                <input name="expiry-end" value="18" />
                <input name="cvc" value="314" />
                <input type="submit" class="btn btn-primary" value="Buy" />
            </form>
        </div>
    </div>
</div>

<?php
    require '../app/views/footer.php';
?>