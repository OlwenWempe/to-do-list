<?php
if (isset($_SESSION['user']['first_name'])) {
    $first_name = ($_SESSION['user']['first_name']);
} else {
    $first_name = 'chèr(e) inconnu(e)';
    $_SESSION['error'][] = `Il semblerait que vous avez oublié de vous identifier`;
    header('Location: login.php');
}