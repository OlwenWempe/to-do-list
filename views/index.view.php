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
    <title>2 Do</title>
</head>

<body>

    <main id="index-main" class="pb-5">
        <h1 class="d-none">To Do List</h1>
        <!-- <img class="d-flex justify-content-center" src="./assets/img/To-Do-List.gif" alt=""> -->
        <div id="video-div" class="pt-5 row">
            <video autoplay class="col-7 mx-auto">
                <source src="./assets/img/To-Do-List.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div id="h2-div" class="mx-auto col-8 rounded-pill">
            <h2 id="h2-index" class=" py-2 text-center mb-5">
                La solution pour ne plus jamais oublier vos tâches à réaliser !!
            </h2>
        </div>

        <ul class="list-group">
            <div class="row mb-3">
                <h3 class="text-center my-3">Rejoignez-nous maintenant !</h3>
                <li class="index-li list-group-item col-3 mx-auto py-2 text-center rounded-pill">
                    <a class="text-decoration-none fs-4" href="register.php">Inscription</a>
                </li>
            </div>
            <div class="row mb-3">
                <h3 class="text-center my-3">Déjà client ? Connectez-vous pour voir votre To Do List !</h3>
                <li class="index-li list-group-item col-3 mx-auto py-2 text-center rounded-pill">
                    <a class="text-decoration-none fs-4" href="login.php">Connexion</a>
                </li>
            </div>
        </ul>