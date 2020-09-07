<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

class User
{

    //déclaration de 3 variables public qui s'apparentent au champs de la base de donnée
    //le public permaet d'acceder à la valeur de la variable directement : $user->user
    public $id;
    public $user;
    public $pwd;

    public function __construct($id, $user, $pwd)
    {
        //utilisation de $this-> car les variables ne sont pas static
        $this->id = $id;
        $this->user = $user;
        $this->pwd = $pwd;
    }

    public static function find($user)
    {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT idUser, pwd FROM user WHERE user = :user');
        /* the query was prepared, now we replace :user with our actual $user value */
        $req->execute(array(':user' => $user));
        $user = $req->fetch(PDO::FETCH_ASSOC);
        if ($req->rowCount() > 0) {
            return new User($user['idUser'], $user, $user['pwd']);
        } else {
            return false;
        }
    }

    /**
     * detruit la session actuelle
     *
     * @return void
     */
    public static function logout()
    {
        $_SESSION = array();
        session_destroy();
    }

    public static function insert($userName, $pwd) {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO user (user, pwd) VALUES (:user, :pwd)');
        $req->bindParam(':user', $userName);
        $req->bindParam(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
        $retour = $req->execute();
        return $retour;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT idUser, user FROM user');

        // we create a list of User objects from the database results
        foreach ($req->fetchAll() as $user) {
            $list[] = new User($user['idUser'], $user['user'], NULL);
        }
        return $list;
    }
}
