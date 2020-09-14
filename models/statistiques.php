<?php

class Statistique
{

    /**
     * affichage du nombre d'utilisateurs de la base de donnée
     *
     * (je ne met pas de '@'return car il peux y avoir deux types différents ce qui provoque des "fatal error" dans certains cas)
     */
    public static function nbrUtilisateurs()
    {
        $bd = Db::getInstance();
        $req = $bd->query("SELECT count(*) as 'nbr' from users"); //count des utilisateurs de la base de donnée
        $retour = $req->fetch(); //fetch : retourne la ligne qui à subit une modification
        return $retour[0];
    }

    /**
     * affichage du nombre de posts de la base de donnée
     *
     * (je ne met pas de '@'return car il peux y avoir deux types différents ce qui provoque des "fatal error" dans certains cas)
     */
    public static function nbrPosts()
    {
        $bd = Db::getInstance();
        $req = $bd->query("SELECT count(*) as 'nbr' from posts"); //count des posts de la base de donnée
        $retour = $req->fetch(); //fetch : retourne la ligne qui à subit une modification
        return $retour[0];
    }
}
