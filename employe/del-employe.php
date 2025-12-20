<?php
include '../functions.php';
require '../connexiondb.php';

$idEmploye = $_GET['id'] ?? null;

if (!is_numeric($idEmploye)) {
    dd("cet employé n'existe pas !!!");
}

$previousId = getIdEmployeBeforeGiven($pdo, $idEmploye);

$state = deleteEmploye($pdo, $idEmploye);

if ($state) {
    if (isset($previousId))
        redirect("/employe/list-employe.php#id" . $previousId);
    else
        redirect("/employe/list-employe.php");
}
