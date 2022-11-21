<?php
$title = 'Déconnexion';
if (isset($_SESSION['authenticated'])) {
    require_once './views/logout.view.php';
} else {
    header('Location: destroy.php');
}