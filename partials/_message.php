<?php if (isset($_SESSION['errors'])) : ?>
<?php foreach ($_SESSION['errors'] as $error) : ?>

<div class="alert alert-danger" role="alert">
    <?= $error ?>
</div>

<?php endforeach ?>

<?php $_SESSION['errors'] = [] ?>
<?php endif ?>

<?php if (isset($_SESSION['success'])) : ?>
<?php foreach ($_SESSION['success'] as $success) : ?>

<div class="alert alert-success" role="alert">
    <?= $success ?>
</div>

<?php endforeach ?>

<?php $_SESSION['errors'] = [] ?>
<?php endif ?>