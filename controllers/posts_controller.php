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
    /**
     * affichage de tout les posts
     *
     * @return void
     */
    public function list(): void
    {
        //appel de la méthode all qui affiche tout les posts de la base de donnée
        $posts = Post::all();
        //appel de la vue des posts
        require_once('views/posts/listPost.php');
    }

    //Opérations du CRUD - create, read, update, delete
    /**
     * insertion d'un nouveau post dans la base de donnée
     *
     * @return void
     */
    public function insert(): void
    {
        //vérification des champs du formulaire de création
        $inputAuteur = filter_input(INPUT_POST, 'auteur', FILTER_SANITIZE_STRING);
        $inputObjet = filter_input(INPUT_POST, 'objet', FILTER_SANITIZE_STRING);
        if (!isset($inputAuteur) || !isset($inputObjet)) {
            call('pages', 'error');
        }

        //appel de la fonction create avec les valeurs saisies par l'utilisateurs
        $post = Post::insert($inputAuteur, $inputObjet);
        if ($post) {
            //stockage du message de validation en session
            $_SESSION["message"] = ["success" => "Le post a bien été ajouté !"];
            //appel de la fonction list qui affiche aussi le post créé
            $this->list();
        } else { //en cas d'erreur ($post = false) alors
            call('pages', 'error');
        }
    }

    /**
     * affichage du détail d'un post
     *
     * @return void
     */
    public function detail(): void
    {
        //filtrage/validaion de l'id
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $varId = filter_var($getId, FILTER_VALIDATE_INT);
        //si il n'y a pas d'id du l'URL alors on affiche la page erreur
        if (!isset($varId)) {
            call('pages', 'error');
        }

        //appel de la méthode find pour afficher le détail du post choisi
        $post = Post::find($varId);
        //affichage de la vue des détails
        require_once('views/posts/detail.php');
    }

    /**
     * mise à jour d'un post
     *
     * @return void
     */
    public function update(): void
    {
        //filtrage/validaion de l'id
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $varId = filter_var($getId, FILTER_VALIDATE_INT);
        $inputObjet = filter_input(INPUT_POST, 'objet', FILTER_SANITIZE_STRING);
        //vérification de la présence de l'id dans l'URL et du champ du formulaire de modification 
        if (!isset($varId) || !isset($inputObjet)) {
            call('pages', 'error');
        }

        //appel de la fonction update avec comme paramètre l'id du post modifié et l'objet modifié par l'utilisateur
        $post = Post::update($varId, $inputObjet);
        if ($post) {
            //stockage du message de validation
            $_SESSION["message"] = ["success" => "Le post a bien été mis à jour"];
            //appel de la fonction list de ce fichier pour lister les posts
            $this->list();
        } else { //en cas d'erreur ($post = false) alors
            call('pages', 'error');
        }
    }

    /**
     * suppression d'un post
     *
     * @return void
     */
    public function delete(): void
    {
        //filtrage/validaion de l'id
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $varId = filter_var($getId, FILTER_VALIDATE_INT);
        //vérification de la présence de l'id dans l'URL
        if (!isset($varId)) {
            call('pages', 'error');
        }

        //appel de la méthode delete qui supprimer le post choisi
        $post = Post::delete($varId);
        if ($post) {
            //stockage du message de validation
            $_SESSION["message"] = ["success" => "Le post a bien été supprimé"];
            //appel de la fonction list
            $this->list();
        } else { //en cas d'erreur ($post = false) alors
            call('pages', 'error');
        }
    }

    //Affichage des formulaires
    /**
     * affichage du formulaire de création de posts
     *
     * @return void
     */
    public function displayFormCreate(): void
    {
        require_once('views/posts/create.php');
    }

    /**
     * affichage du formulaire de modification d'un post
     *
     * @return void
     */
    public function displayFormUpdate(): void
    {
        //filtrage/validaion de l'id
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $varId = filter_var($getId, FILTER_VALIDATE_INT);
        //si il n'y a pas d'id alors on affihe la page erreur
        if (!isset($varId)) {
            call('page', 'error');
        }

        //recherche des informations du post à modifier en utilisant la méthode find avec l'id de l'URL
        $post = Post::find($varId);
        //affichage du formulaire de modification
        require_once('views/posts/update.php');
    }
}
