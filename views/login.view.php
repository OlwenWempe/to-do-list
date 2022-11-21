<?php

require_once './views/partials/header.view.php';
?>


<form method="post" action="login.php">
    <div class="row form-group">
        <div class="pb-3 col-6 mx-auto">
            <label for="email" class="ms-3 chalk form-label">Adresse email</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?php if (isset($_POST['email'])) echo $_POST['email'] ?>">
        </div>
        <div class="pb-5 row form-group">
            <button type="submit" class="chalk col-2 mx-auto btn btnPos" name="suivant">Suivant</button>
        </div>
    </div>
</form>
</section>

<?php
require_once './views/partials/footer.view.php';
?>