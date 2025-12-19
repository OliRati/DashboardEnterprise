<?php
include '../functions.php';
require '../connexiondb.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envoyer'])) {

        require PHP_ROOT."/employe/validation-employe.php";

        if (!empty($prenom) && !empty($nom) && !empty($sexe) && !empty($service) && !empty($date_embauche) && !empty($salaire)) {
            $status = addEmploye($pdo, $prenom, $nom, $sexe, $service, $date_embauche, $salaire);
            if ($status) {
                redirect("/employe/list-employe.php");
            } else {
                $errors[] = "Impossible d'enregistrer cet employé.";
            }
        } elseif (empty($errors)) {
            $errors[] = "Données non valide.";
        }
    }
} else {
    $prenom = "";
    $nom = "";
    $sexe = "";
    $service = "";
    $date_embauche = "";
    $salaire = "";
}

$rubrique = "Ajouter un employé";
include PHP_ROOT . "/views/employe/employe-view.php";
