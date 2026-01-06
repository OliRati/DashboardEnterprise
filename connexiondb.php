<?php
/*
 * Connexion a la Base de Données
 */

$host = DB_HOSTNAME;
$db = DB_NAME;
$user = DB_USER;
$pass = DB_PASSWORD;
$charset = DB_CHARSET;

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

function showError($title, $text)
{
    ?>
    <style>
        @keyframes error-blink {
            0% {
                border: 0.4rem solid lightcoral;
            };

            50% {
                border: 0.4rem solid bisque;
            }
        }

        .error-frame {
            background-color: bisque;
            padding: 1rem;
            margin: 1rem 0;
            border: 0.4rem solid lightcoral;
            animation: error-blink 1s steps(1, start) infinite;
        }

        .error-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: lightcoral;
            margin-bottom: 1rem;
        }

        .error-text {
            font-size: 1rem;
            font-weight: 500;
            color: gray;
        }
    </style>

    <div class="error-frame">
        <div class="error-title"><?=  $title ?></div>
        <div class="error-text"><?= $text ?></div>
    </div>
    <?php
}

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $error) { 
    showError('Erreur de connexion PDO', $error->getMessage());
    error_log('Fatal Error connecting to database');
    die();
}
