<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//ajout du fichier contenant les constantes neccessaires à la connexion à la base de donnée
include 'config.inc.php';

class Db {

    //création d'une variable static
    private static $instance = NULL;

    //constructeur
    private function __construct() {
        
    }
    
    //création du lien à la base de donnée avec pdo
    public static function getInstance() {
        //l'opérateur :: permet d'avoir accès à une varible déclarée en static dans la classe. Utiliser this-> ne fonctionne pas car la variable est statique
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;//defini le rapport d'erreur ATTR_ERRMODE par une exeption qui represente une erreur pdo ERRMODE_EXCEPTION
            //je remplace les informations neccessaires à la connexion par les contantes du fichier config.inc.php
            self::$instance = new PDO(SERVEUR . ':host=' . HOST . ';dbname=' . DBNAME, USER, PWD, $pdo_options);
        }
        //return de la connexion à la base
        return self::$instance;
    }

}

?>