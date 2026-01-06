<?php
// Get project configuration file
if (file_exists('env.php'))
    require 'env.php';
elseif (file_exists('env-example.php'))
    require 'env-example.php';
else die("No configuration file found !!!");

if (ENABLE_DEBUG === 'on') {
    // Enable more debugging output
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

require PHP_ROOT . '/functions.php';
require PHP_ROOT . '/connexiondb.php';
