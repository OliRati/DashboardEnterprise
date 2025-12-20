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
    $sql = "SELECT * FROM employes e JOIN services s ON e.id_services = s.id_services ORDER BY id_employes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $employes = $stmt->fetchAll();

    return $employes;
}

function getListService($pdo)
{
    $sql = "SELECT * FROM services ORDER BY id_services";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $services = $stmt->fetchAll();

    return $services;
}

function getEmploye($pdo, $id)
{
    $sql = "SELECT * FROM employes e JOIN services s ON e.id_services = s.id_services WHERE id_employes = :id";
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

function getCountEmployePerSex($pdo)
{
    $sql = "SELECT COUNT(*) AS nb, sexe FROM employes GROUP BY sexe";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute();

    if ($state) {
        $tab = $stmt->fetchAll();
        return $tab;
    }

    return false;
}

function getCountService($pdo)
{
    $sql = "SELECT COUNT(*) AS nb FROM services";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $nb = $stmt->fetch();

    return $nb['nb'];
}

function addEmploye($pdo, $prenom, $nom, $sexe, $id_services, $date_embauche, $salaire)
{
    $sql = "INSERT INTO employes (prenom, nom, sexe, id_services, date_embauche, salaire ) VALUES (:prenom, :nom, :sexe, :id_services, :date_embauche, :salaire)";
    $stmt = $pdo->prepare($sql);
    $state = $stmt->execute([
        ':prenom' => $prenom,
        ':nom' => $nom,
        ':sexe' => $sexe,
        ':id_services' => $id_services,
        ':date_embauche' => $date_embauche,
        ':salaire' => $salaire
    ]);

    return $state;
}

function updateEmploye($pdo, $idEmploye, $prenom, $nom, $sexe, $id_services, $date_embauche, $salaire)
{
    $sql = "UPDATE employes SET prenom = :prenom, nom = :nom, sexe = :sexe, id_services = :id_services, date_embauche = :date_embauche, salaire = :salaire WHERE id_employes = :id_employes";
    $stmt = $pdo->prepare($sql);

    $result = $stmt->execute([
        ':prenom' => $prenom,
        ':nom' => $nom,
        ':sexe' => $sexe,
        ':id_services' => $id_services,
        ':date_embauche' => $date_embauche,
        ':salaire' => $salaire,
        ':id_employes' => $idEmploye
    ]);

    return $result;
}

function deleteEmploye($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM employes where id_employes = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $result = $stmt->execute();

    return $result;
}

// Return the id_employes just before given one
function getIdEmployeBeforeGiven($pdo, $id)
{
    $sql = "SELECT MAX(id_employes) AS previous_id FROM employes WHERE id_employes < :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $status = $stmt->execute();

    if ($status) {
        $result = $stmt->fetch();
        return $result['previous_id'];
    }

    return false;
}

function getLastIdEmploye($pdo)
{
    $sql = "SELECT MAX(id_employes) AS last_id FROM employes";
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();

    if ($status) {
        $result = $stmt->fetch();
        return $result['last_id'];
    }

    return false;
}

function getMeanSalary($pdo)
{
    $sql = "SELECT ROUND(AVG(salaire),0) AS salaire_moyen FROM employes";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();

    if ($result) {
        $value = $stmt->fetch();

        return $value['salaire_moyen'];
    }

    return false;
}

function getMeanSalaryPerSex($pdo)
{
    $sql = "SELECT sexe, ROUND(AVG(salaire),0) AS salaire_moyen FROM employes GROUP BY sexe";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();

    if ($result) {
        $value = $stmt->fetchAll();
        return $value;
    }

    return false;
}

function getMeanSalaryPerService($pdo)
{
    $sql = "SELECT e.id_services, service, ROUND(AVG(salaire),0) AS salaire_moyen FROM employes e JOIN services s ON e.id_services = s.id_services  GROUP BY id_services";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute();

    if ($result) {
        $value = $stmt->fetchAll();
        return $value;
    }

    return false;
}