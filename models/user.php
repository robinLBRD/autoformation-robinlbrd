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

    /**
     * detruit la session actuelle
     *
     * @return void
     */
    public static function logout(): void
    {
        $_SESSION = array();
        session_destroy();
        session_start();
    }

    /**
     * listing des utilisateurs
     *
     * @return array
     */
    public static function all(): array
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT idUser, user FROM users');//préparation de la requête
        $req->execute();

        //parcour des resultats
        foreach ($req->fetchAll() as $user) {
            $list[] = new User($user['idUser'], $user['user'], NULL);
        }
        return $list;
    }

    /**
     * insertion dans la base de donnée
     *
     * @param string $userName
     * @param string $pwd
     * (je ne met pas de '@'return car il peux y avoir deux types différents ce qui provoque des "fatal error" dans certains cas)
     */
    public static function insert(string $userName, string $pwd)
    {
        $db = Db::getInstance();
        //préaparation de la requête
        $req = $db->prepare('INSERT INTO users (user, pwd) VALUES (:user, :pwd)');
        $req->bindParam(':user', $userName);
        //hash du password
        $password = password_hash($pwd, PASSWORD_DEFAULT);
        $req->bindParam(':pwd', $password);
        $retour = $req->execute();
        return $retour;
    }

    /**
     * méthode qui permet de retrouver les informations d'un utilisateur
     *
     * @param string $user
     * (je ne met pas de '@'return car il peux y avoir deux types différents ce qui provoque des "fatal error" dans certains cas)
     */
    public static function find(string $username)
    {
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE user = :user'); //préparation de la requête
        $req->bindParam(':user', $username);
        $req->execute(); //ajout dans la requête de la valeur de l'id
        $user = $req->fetch(); //récupération des infomrmations de l'enregistrement obtenu
        if($user){
            return new User($user['idUser'], $user['user'], $user['pwd']); //return du post au complet
        }else{
            return false;
        }
    }

    /**
     * méthode qui permet de mettre à jour le mot de passe de l'utilisateur
     *
     * @param integer $id
     * @param string $pwd
     * (je ne met pas de '@'return car il peux y avoir deux types différents ce qui provoque des "fatal error" dans certains cas)
     */
    public static function update(int $id, string $pwd)
    {
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE users SET pwd = :pwd WHERE idUser = :id');
        //hash du password
        $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
        $req->bindParam(':pwd', $pwdHash);
        $req->bindParam(':id', $id);//bind des paramètres
        $retour = $req->execute();
        return $retour;
    }

    /**
     * suppression d'un utilisateur
     *
     * @param int $id
     * (je ne met pas de '@'return car il peux y avoir deux types différents ce qui provoque des "fatal error" dans certains cas)
     */
    public static function delete(int $id)
    {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM users WHERE idUser = :id');
        $req->bindParam(':id', $id);
        $retour = $req->execute();//execution de la requête avec les bons paramètres
        return $retour;
    }
}
