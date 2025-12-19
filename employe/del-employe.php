<?php
include '../functions.php';
require '../connexiondb.php';

$idEmploye = $_GET['id'] ?? null;

if (!is_numeric($idEmploye)) {
    dd("cet employé n'existe pas !!!");
}

$state = deleteEmploye($pdo, $idEmploye);

if ($state) {
    redirect("/employe/list-employe.php");
}