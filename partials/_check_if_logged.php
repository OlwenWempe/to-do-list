<?php

require_once '_start_session.php';
if (!isset($_SESSION['user']['auth']) || !$_SESSION['user']['auth']) {
    header('Location: index.php');
    exit;
}