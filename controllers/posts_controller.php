<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

//controlleur des posts
class PostsController
{

    //affichage de tout les posts
    public function index()
    {
        //appel de la méthode all qui affiche tout les posts
        $posts = Post::all();
        require_once('views/posts/index.php');
    }

    //affichage du détail d'un post
    public function show()
    {
        //si il n'y a pas d'id alors on affihe une erreur sur la page
        if (!isset($_GET['id'])) {
            return call('pages', 'error');
        }
        //appel de la méthode find pour afficher le détail du post en question
        $post = Post::find($_GET['id']);
        require_once('views/posts/show.php');
    }

    //création d'un post
    public function create()
    {
        require_once('views/posts/create.php');
        //appel de la méthode create
    }

    public function insert() {
        // add a new post in database
        if (!isset($_POST['auteur']) || !isset($_POST['objet'])) {
            return call('pages', 'error');
        }
        // insert post
        $post = Post::create($_POST['auteur'], $_POST['objet']);
        // check if error
        if ($post) {
            // show posts
            $this->index();
        } else {
            return call('pages', 'error');
        }
    }

    public function edit()
    {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $post = Post::find($_GET['id']);
        // view form for update content of current post
        require_once('views/posts/update.php');
    }
    //update d'un post
    public function update()
    {
        if (!isset($_GET['id']) || !isset($_POST['objet']))
        return call('pages', 'error');

        // we use the given id to update the right post
        $post = Post::update($_GET['id'], $_POST['objet']);
        // check if error
        if ($post) {
            // show posts
            $this->index();
        } else {
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
            // show posts
            $this->index();
        } else {
            return call('pages', 'error');
        }
    }
}
