<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title><?= $title ?></title>
</head>

<body id="body">
    <nav class="border border-bottom-light">
        <ul class="nav justify-content-around align-items-center">
            <li class="nav-item">
                <a class="nav-link active" href="index.php" aria-current="page"><img id="nav-logo"
                        src="./assets/img/To-Do-List_ss-fond.svg" alt="logo"></a>
            </li>
            <h2 class="nav-h2 chalk">2Do</h2>
            <div class="d-flex">

            </div>
        </ul>
    </nav>

    <main id="main" class="pt-5">
        <section class="container">
            <h1 class="chalk text-center mb-3"><?= $title ?></h1>
            <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; ?>
            </div>
            <?php unset($_SESSION['error']);
            endif; ?>
            <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; ?>
            </div>
            <?php unset($_SESSION['success']);
            endif; ?>