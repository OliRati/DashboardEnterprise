<?php
require "functions.php";
require PHP_ROOT . "/connexiondb.php";

require PHP_ROOT . "/views/partials/head.php"; ?>

<h1>Synthèse</h1>

<div class="container">
    <p><span class="stats-title">Effectifs</span><br>
        <span class="stats-name tab">Nombre total d'employés</span><span
            class="stats-value"><?= getCountEmploye($pdo) ?></span><br>
        <?php $employePerSex = getCountEmployePerSex($pdo);
        foreach ($employePerSex as $employe) {
            if ($employe['sexe'] === 'm') { ?>
                <span class="stats-name tab2">Hommes</span><span class="stats-value"><?= $employe['nb'] ?></span><br>
            <?php } elseif ($employe['sexe'] === 'f') { ?>
                <span class="stats-name tab2">Femmes</span><span class="stats-value"><?= $employe['nb'] ?></span><br>
            <?php }
        } ?>
    </p>
    <p><span class="stats-title">Services</span><br>
        <span class="stats-name tab">Nombre de services</span><span class="stats-value"><?= getCountService($pdo) ?></span>
    </p>
    <p><span class="stats-title">Salaire mensuel moyen</span><br>
        <span class="stats-name tab">Global</span><span class="stats-value"><?= getMeanSalary($pdo) ?> €</span><br>
        <?php $means = getMeanSalaryPerSex($pdo);
        foreach ($means as $mean) {
            if ($mean['sexe'] == "m") { ?>
                <span class="stats-name tab">Hommes</span><span class="stats-value"><?= $mean['salaire_moyen'] ?> €</span><br>
            <?php } elseif ($mean['sexe'] == "f") { ?>
                <span class="stats-name tab">Femmes</span><span class="stats-value"><?= $mean['salaire_moyen'] ?> €</span><br>
            <?php } ?>
        <?php } ?>
    </p>

    <p>
        <span class="stats-title">Salaire mensuel moyen par service</span><br>
        <?php
        $means = getMeanSalaryPerService($pdo);
        foreach ($means as $mean) { ?>
            <span class="stats-name tab"><?= $mean['service'] ?></span><span
                class="stats-value"><?= $mean['salaire_moyen'] ?> €</span><br>
        <?php } ?>
    </p>
    </p>


</div>

<?php require PHP_ROOT . "/views/partials/tail.php"; ?>