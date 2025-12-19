<?php
/*
 * Connexion a la Base de Données
 */

$host = 'localhost';
$db = 'entreprise';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $error) { ?>
    <div style="background-color: bisque; padding: 1rem; margin: 1rem 0">
        <h1 style="color: lightcoral">Erreur de connexion PDO</h1>
        <p style="color: gray"><?= $error->getMessage() ?></p>
    </div>
    <?php
    die('Impossible de se connecter à la base de donnée !');
}
