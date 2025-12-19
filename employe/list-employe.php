<?php
include '../functions.php';
require '../connexiondb.php';

$employes = getListEmploye($pdo);

include PHP_ROOT . "/views/employe/list-employe-view.php";
