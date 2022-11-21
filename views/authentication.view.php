<?php
require_once './views/partials/header.view.php';
?>

<h2 class="chalk text-center mb-5">Bonjour <?= $first_name ?></h2>
<form method="post" action="authentication.php">
    <div class="pb-3 form-group">
        <div class="row col-6 mx-auto">
            <label for="password" class="chalk ps-3 form-label">Veuillez entrer votre mot de passe</label>
            <input type="password" name="password" id="password"
                value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>" class="form-control" required>
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
        <div class="pb-5 row form-group">
            <button type="submit" class="chalk col-2 mx-auto btn btnPos" name="connexion">Connexion</button>
        </div>
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
<script src="./assets/js/password_checkbox.js"></script>

</body>

</html>