<?php

session_start();
ob_start();
require_once("Model/Model.php");



include('vue/header.php');

if (isset($_REQUEST["controleur"])) {
    $controleur = $_REQUEST["controleur"];
} else {
    $controleur = "accueil";
}

/**
 * Verification de la valeur de $controleur
 * 
 * Faire une action pour chaque valeur de contrôleur 
 * Inclure le controleur correspondant ou rediriger vers index.php 
 */
switch ($controleur) {
    case 'accueil':
        header("index.php");
        break;

    case 'auth':
        include("controleur/auth.php");
        break;
}
