<?php
$errors = [];

$serviceList = getListService($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['envoyer'])) {

        require PHP_ROOT."/employe/validation-employe.php";
        
        if (!empty($prenom) && !empty($nom) && !empty($sexe) && !empty($id_services) && !empty($date_embauche) && !empty($salaire)) {
            $status = addEmploye($pdo, $prenom, $nom, $sexe, $id_services, $date_embauche, $salaire);
            if ($status) {
                $lastId = getLastIdEmploye($pdo);
                if (isset($lastId))
                    redirect("?page=list-employe#id".$lastId);
                else
                    redirect("?page=list-employe");
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
    $id_services = "";
    $date_embauche = "";
    $salaire = "";
}

$rubrique = "Ajouter un employé";
include PHP_ROOT . "/views/employe/employe-view.php";
