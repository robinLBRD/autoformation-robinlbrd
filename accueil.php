<?php ob_start();
session_start();

/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//page sur laquelle on arrive au tout début
require_once('inc/connection.inc.php');

//mise en place d'un utilisateur de base
if (!isset($_SESSION["user_session"])) {
    $_SESSION["user_session"] = "Visiteur";
}

//test pour savoir si il y a déja un controlleur ou une action présente dans l'url
if (isset($_GET['controller']) && isset($_GET['action'])) {
    //si oui alors on assigne à controlleur et à action les valeurs
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    //sinon on met des valeurs par défaut pour afficher la page home
    $controller = 'pages';
    $action = 'home';
}

//page surlaquelle il y a le header, le main et le footer
require_once('views/layout.php');

ob_end_flush();