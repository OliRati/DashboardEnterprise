<?php
$idEmploye = $_GET['id'] ?? null;

if (!is_numeric($idEmploye)) {
    dd("cet employé n'existe pas !!!");
}

$previousId = getIdEmployeBeforeGiven($pdo, $idEmploye);

$state = deleteEmploye($pdo, $idEmploye);

if ($state) {
    if (isset($previousId))
        redirect("?page=list-employe#id" . $previousId);
    else
        redirect("?page=list-employe");
}
