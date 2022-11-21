<?php

/**
 * To Do List - index.php
 * @version: 1.0.0
 * 
 * @author: Olwen WEMPE
 * @copyright Copyright (c) 2022, Olwen WEMPE
 */
session_start();
if (isset($_SESSION['authenticated'])) {
    header('Location: to-do.php');
} else {
    require_once 'views/index.view.php';
    require_once 'views/partials/footer.view.php';
}