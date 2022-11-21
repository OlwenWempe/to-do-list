<?php

require_once './views/partials/header.view.php';
?>

<form id="form" action="register.php" method="post">
    <div class="pb-3 row form-group">
        <div class="col-6 mx-auto">
            <label for="last_name" class="chalk ps-3 form-label">Nom</label>
            <input type="text" name="last_name" id="last_name"
                value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name'] ?>" class="form-control" required>
        </div>
    </div>
    <div class="pb-3 row form-group">
        <div class="col-6 mx-auto">
            <label for="first_name" class="chalk ps-3 form-label">Prénom</label>
            <input type="text" name="first_name" id="first_name"
                value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name'] ?>" class="form-control"
                required>
        </div>
    </div>
    <div class="pb-3 row form-group">
        <div class="col-6 mx-auto">
            <label for="email" class="chalk ps-3 form-label">Adresse mail</label>
            <input type="mail" name="email" id="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>"
                class="form-control" required>
            <div>
                <p id="message" class="ps-3 pt-3"></p>
            </div>
        </div>
    </div>
    <div class="pb-3 row form-group">
        <div>
            <div class="col-6 mx-auto">
                <label for="password" class="chalk ps-3 form-label">Mot de passe</label>
                <input type="password" name="password" id="password" value="" class="form-control" required>
                <div>
                    <small>
                        <p id="message2" class="ps-3 pt-3"></p>
                    </small>
                </div>
            </div>
            <div class="mb-3 col-3 mx-auto form-check">
                <input type="checkbox" class="form-check-input" id="checkBox">
                <label class="form-check-label" for="checkBox"><small>Montrer le mot de passe</small></label>
            </div>
        </div>
    </div>
    <div class="pb-5 row form-group">
        <button id="register-submit" name="submit" type="submit" class="col-2 mx-auto btn btn-primary">Valider</button>
    </div>
</form>
</section>
</main>
<footer class=" bg-dark">
    <ul class="nav justify-content-center py-3">
        <li class="nav-item">
            <a class="nav-link" href="#" aria-current="page">CGU</a>
        </li>
        <li class="nav-item">
            <a class="nav-link color-light" href="#">politique de confidentialité</a>
        </li>
        <li class="nav-item">
            <a class="nav-link color-light" href="https://owempe.eu">@copyright Olwen WEMPE</a>
        </li>
    </ul>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="./assets/js/mailtest.js"></script>
<script src="./assets/js/password_test.js"></script>
<script src="./assets/js/password_checkbox.js"></script>
</body>

</html>