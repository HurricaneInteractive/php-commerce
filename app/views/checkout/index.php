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
    </div>
</div>