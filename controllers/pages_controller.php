<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//controller des pages
class PagesController {
    //page d'accueil
    public function home() {
        require_once('views/pages/home.php');
    }

    //si une erreur est rencontrée
    public function error() {
        require_once('./views/pages/error.php');
    }
}