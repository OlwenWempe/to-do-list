<?php
require_once './views/_partials/auth_header.view.php';
?>
<div class="">
    <?php if (!isset($tasks_done) || ($tasks_done == false)) : ?>
    <div class="mx-auto col-5 alert alert-success">
        <p class="mb-5">C'est un peu vide par ici. Vous avez sûrement des tâches à finir.</p>
        <div class=" d-flex justify-content-center">
            <a class="col-4 btn btnPos" href="to-do.php">Voir
                mes 2Do</a>
        </div>
    </div>

    <?php else : ?>
    <div class="container d-flex justify-content-center my-5">
        <a class="col-4 btn btnPos" href="to-do.php">Voir mes 2Do</a>
    </div>

    <div class="">


        <table class="table-done mx-auto table table-striped">
            <thead>
                <tr>
                    <th class="chalk ps-5" colspan="2">2Do</th>
                    <th class="chalk ps-5 d-flex" colspan="1">Fait le
                        <span>
                            <form method="GET" id="orderForm" class="ms-5">
                                <select name="order" id="order">
                                    <option value="">Trier par</option>
                                    <option value="asc">Le plus récent </option>
                                    <option value="desc">Le plus ancien</option>
                                </select>
                            </form>
                        </span>
                    </th>

                </tr>
            </thead>

            <tbody>
                <?php foreach ($tasks_done as $task_done) : ?>

                <tr class="table-success">
                    <td colspan="2"><?= $task_done->name ?></td>
                    <td colspan="1"><?= $task_done->done_at ?></td>
                    <td>
                        <a href=" delete_def.php?id=<?= $task_done->id ?>" class="btn btnMod">Supprimer
                            définitivement</a>
                        <!-- <input type='submit' value='Supprimer définitivement' name="delete" class="btn btnMod"> -->
                    </td>
                </tr>

                <?php endforeach; ?>


            </tbody>
            <?php endif; ?>
    </div>
    </table>
</div>
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
<script src="./assets/js/order_change.js"></script>

</body>

</html>