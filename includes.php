<?php
session_start();

// --- CSRF token: generate if missing ---
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Get project configuration file
if (file_exists('env.php'))
    require 'env.php';
elseif (file_exists('../env.php'))
    require '../env.php';
elseif (file_exists('env.php'))
    require 'env-example.php';
elseif (file_exists('../env.php'))
    require '../env-example.php';
else die("No configuration file found !!!");

require PHP_ROOT . '/functions.php';
require PHP_ROOT . '/connexiondb.php';
