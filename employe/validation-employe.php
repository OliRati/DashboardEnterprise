<?php
$prenom = "";
$nom = "";
$sexe = "";
$id_services = "";
$date_embauche = "";
$salaire = "";

if (isset($_POST['prenom'])) {
    $prenom = nettoyer($_POST['prenom']);

    if ($prenom === "") {
        $errors[] = "Le prénom ne peut pas être vide";
    } elseif ((strlen($prenom) < 2) || (strlen($prenom) > 30)) {
        $errors[] = "Le prénom doit avoir entre 2 et 30 caractères";
    }
} else {
    $errors[] = "Un prénom doit être défini";
}

if (isset($_POST['nom'])) {
    $nom = nettoyer($_POST['nom']);
    if ($nom === "") {
        $errors[] = "Le nom ne peut pas être vide";
    } elseif ((strlen($nom) < 2) || (strlen($nom) > 30)) {
        $errors[] = "Le nom doit avoir entre 2 et 30 caractères";
    }
} else {
    $errors[] = "Un nom doit être défini";
}

if (isset($_POST['sexe'])) {
    $sexe = nettoyer($_POST['sexe']);

    if ($sexe != "m" && $sexe != "f") {
        $errors[] = "Le sexe est soit 'm' soit 'f'";
    }
} else {
    $errors[] = "Le sexe doit être défini";
}

if (isset($_POST['id_services'])) {
    $id_services = nettoyer($_POST['id_services']);

    if ($id_services === "") {
        $errors[] = "Un service doit être précisé";
    } elseif (!is_numeric($id_services)) {
        $errors[] = "Un service valide doit être utilisé";
    }
} else {
    $errors[] = "Un service doit être défini";
}

if (isset($_POST['date_embauche'])) {
    $date_embauche = nettoyer($_POST['date_embauche']);

    if ($date_embauche === '') {
        $errors[] = "Une date d'embauche doit être précisée";
    } else {
        if (!isValidDate($date_embauche, 'Y-m-d')) {
            $errors[] = "La date d'embauche n'est pas valide";
        }
    }
} else {
    $errors[] = "Une date d'embauche doit être définie";
}

if (isset($_POST['salaire'])) {
    $salaire = nettoyer($_POST['salaire']);

    if ($salaire === '') {
        $errors[] = "Un salaire doit être précisé";
    } else {
        if (!is_numeric($salaire)) {
            $errors[] = "Le salaire doit être un nombre";
        } elseif (($salaire < 0) || ($salaire > 100000)) {
            $errors[] = "Le montant du salaire est incohérent";
        }
    }
} else {
    $errors[] = "Un salaire doit être défini";
}
