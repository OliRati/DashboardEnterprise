<?php
require PHP_ROOT . "/views/partials/head.php"; ?>

<h1>Employes list</h1>

<div style="margin: 1rem">

    <form action="" method="post">
        <div class="form-line">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?= $prenom ?>">
        </div>
        <div class="form-line">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= $nom ?>">
        </div>
        <div class="form-line">
            <label for="sexe">Sexe</label>
            <input type="text" name="sexe" id="sexe" value="<?= $sexe ?>">
        </div>
        <div class="form-line">
            <label for="service">Service</label>
            <input type="text" name="service" id="service" value="<?= $service ?>">
        </div>
        <div class="form-line">
            <label for="date_embauche">Date d'embauche</label>
            <input type="date" name="date_embauche" id="date_embauche" value="<?= $date_embauche ?>">
        </div>
        <div class="form-line">
            <label for="salaire">Salaire mensuel en €</label>
            <input type="number" name="salaire" id="salaire" value="<?= $salaire ?>">
        </div>

        <div class="form-line">
            <button type="submit" name="envoyer">Envoyer</button>
            <button type="button">Annuler</button>
        </div>

        <?php if (isset($errors)) { ?>
            <div class="error">
                <?php foreach ($errors as $error) { ?>
                    <?= $error ?><br>
                <?php } ?>
            </div>
        <?php } ?>
    </form>

</div>

<?php require PHP_ROOT . "/views/partials/tail.php"; ?>