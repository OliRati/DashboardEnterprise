<?php
$prenom = "";
$nom = "";
$sexe = "";
$service = "";
$date_embauche = "";
$salaire = "";

if (isset($_POST['prenom'])) {
    $prenom = nettoyer($_POST['prenom']);

    if ($prenom === "") {
        $errors[] = "Le prenom ne peut pas être vide";
    } elseif ((strlen($prenom) < 2) || (strlen($prenom) > 30)) {
        $errors[] = "Le prenom doit avoir entre 2 et 30 caractères";
    }
}

if (isset($_POST['nom'])) {
    $nom = nettoyer($_POST['nom']);
    if ($nom === "") {
        $errors[] = "Le nom ne peut pas être vide";
    } elseif ((strlen($nom) < 2) || (strlen($nom) > 30)) {
        $errors[] = "Le nom doit avoir entre 2 et 30 caractères";
    }
}

if (isset($_POST['sexe'])) {
    $sexe = nettoyer($_POST['sexe']);

    if ($sexe != "m" && $sexe != "f") {
        $errors[] = "Le sexe est soit 'm' soit 'f'";
    }
}

if (isset($_POST['service'])) {
    $service = nettoyer($_POST['service']);

    if ($service === "") {
        $errors[] = "Un service doit être précisé";
    }
}

if (isset($_POST['date_embauche'])) {
    $date_embauche = nettoyer($_POST['date_embauche']);

    if ($date_embauche === '') {
        $errors[] = "Un date d'embauche doit être précisée";
    } else {
        if (!isValidDate($date_embauche, 'Y-m-d')) {
            $errors[] = "La date d'embauche n'est pas valide";
        }
    }
}

if (isset($_POST['salaire'])) {
    $salaire = nettoyer($_POST['salaire']);

    if ($salaire === '') {
        $errors[] = "Un salaire doit être précisé";
    } else {
        if (!is_numeric($salaire)) {
            $errors[] = "Le salaire doit etre un nombre";
        }
    }
}
