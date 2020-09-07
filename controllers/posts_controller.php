<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//controlleur des posts
class PostsController
{
    //affichage de tout les posts
    public function list()
    {
        //appel de la méthode all qui affiche tout les posts
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    //affichage du détail d'un post
    public function detail()
    {
        //si il n'y a pas d'id alors on affihe une erreur sur la page
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        //appel de la méthode find pour afficher le détail du post en question
        $post = Post::find($_GET['id']);
        //affichage des details du posts
        require_once('views/posts/show.php');
    }

    //appel du formulaire de création de posts
    public function create()
    {
        //affichage du formulaire qui ensuite conduirra grace au "action=" à la fonction de création d'un post
        require_once('views/posts/create.php');
    }

    //insertion d'un nouveau post dans la base
    public function insert()
    {
        //vérification de si il y a bien un objet
        if (!isset($_POST['auteur']) || !isset($_POST['objet'])) {
            return call('pages', 'error');
        }
        //appel de la fonction create avec les valeurs saisies
        $post = Post::insert($_POST['auteur'], $_POST['objet']);
        //puis ré-affichage/actualisation de la list des posts
        if ($post) {
            //appel de la fonction index pour lister les posts
            $this->list();
        } else {
            return call('pages', 'error');
        }
    }

    //affiche le formulaire de modification avec comme information le post qui doit être modifié
    public function edit()
    {
        //si il n'y a pas d'id alors on affihe une erreur sur la page
        if (!isset($_GET['id'])) {
            return call('page', 'error');
        }
        //recherche des informations di post à modifier en utilisant la fonction find
        $post = Post::find($_GET['id']);
        //affichage du formulaire de update
        require_once('views/posts/update.php');
    }

    //update d'un post
    public function update()
    {
        //vérification de si il y a bien un objet
        if (!isset($_GET['id']) || !isset($_POST['objet']))
            return call('pages', 'error');

        //appel de la fonction update avec comme paramètre l'id du post modifié et l'objet modifié par l'utilisateur
        $post = Post::update($_GET['id'], $_POST['objet']);
        //puis ré-affichage/actualisation de la list des posts
        if ($post) {
            //appel de la fonction index pour lister les posts
            $this->list();
        } else { //en cas d'erreur ($post = false) alors
            return call('pages', 'error');
        }
    }

    //delete d'un post
    public function delete()
    {
        //si il n'y a pas d'id alors on affihe une erreur sur la page
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }

        //appel de la méthode delete qui supprimer le post en question
        $post = Post::delete($_GET['id']);
        //puis ré-affichage/actualisation de la list des posts
        if ($post) {
            //appel de la fonction index pour lister les posts
            $_SESSION["message"] = ["success"=>"Le post à bien été supprimé"];
            $this->list();
        } else { //en cas d'erreur ($post = false) alors
            return call('pages', 'error');
        }
    }
}
?>