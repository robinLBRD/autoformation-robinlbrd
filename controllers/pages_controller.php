<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//controller des pages
class PagesController
{
    /**
     * affichage page d'accueil
     *
     * @return void
     */
    public function home(): void
    {
        require_once('views/pages/home.php');
    }

    /**
     * page affichée si une erreur est rencontrée
     *
     * @return void
     */
    public function error(): void
    {
        require_once('./views/pages/error.php');
    }
}
