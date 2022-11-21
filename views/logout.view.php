<?php
require_once './views/_partials/header.view.php';
?>

<section class="container">
    <div class="row">
        <div class="col-5 mx-auto">
            <h2 class="chalk mb-4">Etes vous sur de vouloir vous deconnecter ?</h2>
            <div class="d-flex justify-content-around">
                <a href="destroy.php" class="btn btn-success">Oui</a>
                <a href="index.php" class="btn btn-danger">Non</a>
            </div>
        </div>
    </div>
</section>

<?php
require_once './views/_partials/footer.view.php';
?>