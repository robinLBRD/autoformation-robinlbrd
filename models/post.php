<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

class Post
{

    //déclaration de 3 variables public qui s'apparentent au champs de la base de donnée
    //le public permaet d'acceder à la valeur de la variable directement : $post->author
    public $id;
    public $author;
    public $content;

    //constructeur
    public function __construct($id, $author, $content)
    {
        //utilisation de $this-> car les variables ne sont pas static
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
    }

    /**
     * Liste les posts de la base de donnée
     * 
     * @return array
     */
    public static function all() : array
    {
        $list = []; //liste vide
        $db = Db::getInstance(); //stockage de la connection à la base de donnée dans db
        try {
            $req = $db->query('SELECT * FROM posts'); //requete sql qui récupère tout les posts
            foreach ($req->fetchAll() as $post) { //fetchAll = tableau contenant tout les enregistrements retournées par la requête
                $list[] = new Post($post['id'], $post['author'], $post['content']); //ajout des objets posts dans la list
            }
            //return de la list des posts
            return $list;
        } catch (PDOException $e) {
            echo $e->getMessage();
            $db = null;
        }
    }

    /**
     * Trouve le détail d'un post
     * 
     * @param int $id
     * @return Post
     */
    public static function find(int $id) : Post
    {
        $db = Db::getInstance();
        $validId = intval($id); //vérification de si $id est bien un chiffre
        try {
            $req = $db->prepare('SELECT * FROM posts WHERE id = :id'); //préparation d'une requête sql permettant de retrouver un post grâce à son id
            $req->bindParam(':id', $validId);
            $req->execute(); //ajout dans la requête de la valeur de l'id
            $post = $req->fetch(); //récupération des infomrmations de l'enregistrement obtenu
            return new Post($post['id'], $post['author'], $post['content']); //return du post au complet
        } catch (PDOException $e) {
            echo $e->getMessage();
            $db = null;
        }
    }

    /**
     * Insert un post dans la base de donnée
     * 
     * @param string $auteur
     * @param string $objet
     * @return bool
     */
    public static function insert(string $auteur, string $objet) : bool
    {
        $db = Db::getInstance();
        try {
            $req = $db->prepare('INSERT INTO posts (author, content) VALUES (:auteur, :objet)'); //préparation de la requête sql pour ajouter une post dans la table
            $req->bindParam(':auteur', $auteur);
            $req->bindParam(':objet', $objet);
            $result = $req->execute(); //execution de la requête avec les bonnes valeurs
            return $result; //retourne le nombre de modification effectuées ou false si la requete n'a pas fonctionnée
        } catch (PDOException $e) {
            echo $e->getMessage();
            $db = null;
        }
    }

    /**
     * Met à jour un post
     * 
     * @param int $id
     * @param string $objet
     * @return bool
     */
    public static function update(int $id, string $objet) : bool
    {
        $db = Db::getInstance();
        $validId = intval($id); //vérification de si $id est bien un chiffre
        try {
            $req = $db->prepare('UPDATE posts SET content = :content WHERE id = :id'); //préparation de la requête
            $req->bindParam(':content', $objet);
            $req->bindParam(':id', $validId);
            $result = $req->execute(); //execution de la requête avec les bonnes valeurs
            return $result; //retourne le nombre de modification effectuées ou false si la requete n'a pas fonctionnée
        } catch (PDOException $e) {
            echo $e->getMessage();
            $db = null;
        }
    }

    /**
     * Supprime un post
     * 
     * @param int $id
     * @return bool
     */
    public static function delete(int $id) : bool
    {
        $db = Db::getInstance();
        $validId = intval($id); //vérification de si $id est bien un chiffre
        try {
            $req = $db->prepare('DELETE FROM posts WHERE id = :id'); //préparation de la requête
            $req->bindParam(':id', $validId);
            $result = $req->execute(); //execution de la requête avec le bon id
            return $result; //retourne le nombre de modification effectuées ou false si la requete n'a pas fonctionnée
        } catch (PDOException $e) {
            echo $e->getMessage();
            $db = null;
        }
    }
}
