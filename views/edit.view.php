<?php
$title = 'Modifier mon 2Do';

require_once './views/_partials/header.view.php';
?>

<div class="card mx-auto mb-5" id="task-card">
    <img src="./assets/img/To-Do-List_ss-fond.svg" class="card-img-top" alt="logo">

    <div class="card-body">
        <form action="edit.php" method="post">
            <div class="mb-3 pt-3">
                <label for="name" class="chalk form-label">Nom de votre 2Do</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?php if (isset($update_task)) echo $update_task->name ?>">
            </div>
            <!-- <div class="mb-3 pt-3">
                <label for="description" class="chalk form-label">Petite description</label>
                <textarea type="text" class="form-control" id="description" name="description"
                    aria-describedby="descriptionHelp">
                </textarea>
                <div id="descriptionHelp" class="form-text">Ce champ est optionnel.</div>
            </div> -->



            <div class="mb-5">
                <label for="date" class="ms-3 chalk form-label">Pour quand faut-il finir votre 2Do ?</label>
                <div class="d-flex justify-content-center">
                    <div class="col-4">
                        <input type="date" class="form-control" id="to_do_at" name="to_do_at"
                            value="<?php if (isset($update_task)) echo $update_task->to_do_at ?>">
                    </div>
                </div>
            </div>
            <div class="mb-5 d-flex justify-content-center">
                <button type="submit" class="col-4 btn btn-success">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>


<div class="card">

</div>

<?php
require_once './views/_partials/footer.view.php';
?>