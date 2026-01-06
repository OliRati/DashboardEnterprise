<?php
require "includes.php";
require "routes.php";

$page = filter_input(INPUT_GET, 'page' , FILTER_SANITIZE_FULL_SPECIAL_CHARS ) ?? 'home';

if (!array_key_exists($page, $routes)) {
    require("404.php");
}

require($routes[$page]);
die();