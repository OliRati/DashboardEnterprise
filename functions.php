<?php
const RELATIVE_DIRECTORY = "/devweb-php/DashboardEnterprise";
define("PHP_ROOT", $_SERVER['DOCUMENT_ROOT'] . RELATIVE_DIRECTORY);
define("WEB_ROOT", RELATIVE_DIRECTORY);

/*
 *  Debugging helpers
 */

// Display formated message
function dg($data)
{
    echo '<pre style="background-color: black; color: white; padding: 1rem; margin: 1rem 0">';
    var_dump($data);
    echo "</pre>";
}

// Display formated message and die
function dd($data)
{
    dg($data);
    die();
}

/* Redirection to a new file */
function redirect($url)
{
    header("Location: " . WEB_ROOT . $url);
    exit;
}

/* Cleanup datas for safety */
function nettoyer($dataParam)
{
    $data = trim($dataParam);
    $date = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Vérifie si une date est valide selon un format donné
 *
 * @param string $date   La date à vérifier
 * @param string $format Le format attendu (ex: 'd/m/Y')
 * @return bool          true si valide, false sinon
 */
function isValidDate(string $date, string $format = 'd/m/Y'): bool
{
    // Crée un objet DateTime à partir du format
    $dt = DateTime::createFromFormat($format, $date);

    // Vérifie :
    // 1. Que la création a réussi
    // 2. Qu'il n'y a pas d'erreurs ou avertissements
    // 3. Que la date reformatée correspond exactement à l'entrée
    return $dt
        && $dt->format($format) === $date
        && empty(DateTime::getLastErrors()['warning_count'])
        && empty(DateTime::getLastErrors()['error_count']);
}

/*
 * Database requests
 */
function getListEmploye($pdo)
{
    $sql = "SELECT * FROM employes ORDER BY id_employes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $employes = $stmt->fetchAll();

    return $employes;
}

function getEmploye($pdo, $id)
{
    $sql = "SELECT * FROM employes WHERE id_employes = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $employe = $stmt->fetch();

    return $employe;
}

function getCountEmploye($pdo)
{
    $sql = "SELECT COUNT(*) AS nb FROM employes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $nb = $stmt->fetch();

    return $nb['nb'];
}

function addEmploye($pdo, $prenom, $nom, $sexe, $service, $date_embauche, $salaire)
{
    $sql = "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire ) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)";
    $stm = $pdo->prepare($sql);
    $state = $stm->execute([
        ':prenom' => $prenom,
        ':nom' => $nom,
        ':sexe' => $sexe,
        ':service' => $service,
        ':date_embauche' => $date_embauche,
        ':salaire' => $salaire
    ]);

    return $state;
}

function updateEmploye($pdo, $idEmploye, $prenom, $nom, $sexe, $service, $date_embauche, $salaire)
{
    $sql = "UPDATE employes SET prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, date_embauche = :date_embauche, salaire = :salaire WHERE id_employes = :id_employes";
    $stm = $pdo->prepare($sql);

    $result = $stm->execute([
        ':prenom' => $prenom,
        ':nom' => $nom,
        ':sexe' => $sexe,
        ':service' => $service,
        ':date_embauche' => $date_embauche,
        ':salaire' => $salaire,
        ':id_employes' => $idEmploye
    ]);

    return $result;
}

function deleteEmploye($pdo, $id)
{
    $stm = $pdo->prepare("DELETE FROM employes where id_employes = :id");
    $stm->bindParam(':id', $id, PDO::PARAM_INT);

    $result = $stm->execute();

    return $result;
}
