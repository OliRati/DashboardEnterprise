<?php
require "functions.php";
require PHP_ROOT . "/connexiondb.php";

require PHP_ROOT . "/views/partials/head.php"; ?>

<h1>Synthese</h1>

<div class="container">
    <p>Nombre total d'employés : <?= getCountEmploye($pdo) ?></p>
</div>

<?php require PHP_ROOT . "/views/partials/tail.php"; ?>