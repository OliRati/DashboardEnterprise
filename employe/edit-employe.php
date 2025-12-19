<?php
include '../functions.php';
require '../connexiondb.php';

$idEmploye = $_GET['id'] ?? null;

if (!is_numeric($idEmploye)) {
    dd("cet employé n'existe pas !!!");
}

$employe = getEmploye($pdo, $idEmploye);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envoyer'])) {
        $prenom = nettoyer($_POST['prenom']);
        $nom = nettoyer($_POST['nom']);
        $sexe = nettoyer($_POST['sexe']);
        $service = nettoyer($_POST['service']);
        $date_embauche = nettoyer($_POST['date_embauche']);
        $salaire = nettoyer($_POST['salaire']);

        updateEmploye($pdo, $idEmploye, $prenom, $nom, $sexe, $service, $date_embauche, $salaire);
    }

    redirect("/employe/list-employe.php");
}

include PHP_ROOT . "/views/employe/edit-employe-view.php";
