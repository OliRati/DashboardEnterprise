<?php
include '../functions.php';
require '../connexiondb.php';

$idEmploye = $_GET['id'] ?? null;

if (!is_numeric($idEmploye)) {
    dd("cet employé n'existe pas !!!");
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envoyer'])) {

        require PHP_ROOT . "/employe/validation-employe.php";

        if (!empty($prenom) && !empty($nom) && !empty($sexe) && !empty($service) && !empty($date_embauche) && !empty($salaire)) {
            $status = updateEmploye($pdo, $idEmploye, $prenom, $nom, $sexe, $service, $date_embauche, $salaire);
            if ($status) {
                redirect("/employe/list-employe.php");
            } else {
                $errors[] = "Impossible de modifier cet employé.";
            }
        } elseif (empty($errors)) {
            $errors[] = "Données non valide.";
        }
    }
} else {
    $employe = getEmploye($pdo, $idEmploye);

    $prenom = $employe['prenom'];
    $nom = $employe['nom'];
    $sexe = $employe['sexe'];
    $service = $employe['service'];
    $date_embauche = $employe['date_embauche'];
    $salaire = $employe['salaire'];
}

$rubrique = "Modifier un employé";
include PHP_ROOT . "/views/employe/employe-view.php";
