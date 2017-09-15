<?php require '../app/views/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <?php echo $data['product']->get_name(); ?>
        </div>
    </div>
</div>

<?php require '../app/views/footer.php'; ?>