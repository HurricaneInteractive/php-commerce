<?php 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require '../app/views/header.php';
?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">404 page not found :(</h1>
        </div>
    </div>

<?php require '../app/views/footer.php'; ?>