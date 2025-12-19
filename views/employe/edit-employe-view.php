<?php
require PHP_ROOT . "/views/partials/head.php"; ?>

<h1>Employes list</h1>

<div style="margin: 1rem">

    <form action="" method="post">
        <div class="form-line">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?= $employe['prenom'] ?>">
        </div>
        <div class="form-line">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= $employe['nom'] ?>">
        </div>
        <div class="form-line">
            <label for="sexe">Sexe</label>
            <input type="text" name="sexe" id="sexe" value="<?= $employe['sexe'] ?>">
        </div>
        <div class="form-line">
            <label for="service">Service</label>
            <input type="text" name="service" id="service" value="<?= $employe['service'] ?>">
        </div>
        <div class="form-line">
            <label for="date_embauche">Date d'embauche</label>
            <input type="date" name="date_embauche" id="date_embauche" value="<?= $employe['date_embauche'] ?>">
        </div>
        <div class="form-line">
            <label for="salaire">Salaire mensuel en €</label>
            <input type="number" name="salaire" id="salaire" value="<?= $employe['salaire'] ?>">
        </div>

        <div class="form-line">
            <button type="submit" name="envoyer">Envoyer</button>
            <button type="button">Annuler</button>
        </div>

    </form>

</div>

<?php require PHP_ROOT . "/views/partials/tail.php"; ?>