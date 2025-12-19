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

