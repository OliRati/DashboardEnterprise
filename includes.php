<?php
// Get project configuration file
if (file_exists('env.php'))
    require 'env.php';
elseif (file_exists('env-example.php'))
    require 'env-example.php';
else die("No configuration file found !!!");

require PHP_ROOT . '/functions.php';
require PHP_ROOT . '/connexiondb.php';
