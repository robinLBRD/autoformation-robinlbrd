<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//controlleur des utilisateurs
class UsersController
{
    /**
     * attribut
     *
     * @var [string]
     */
    public $utilisation;

    /**
     * verification de l'éxistance de l'utilisateur dans la base de donnée et comparaison/vérification des deux mots de passes
     *
     * @return void
     */
    public function verifyLogin(): void
    {
        $messageError = null; //stockage de la raison de l'erreur
        //filtrage et stockage des inputs du formulaire de login
        $inputUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $inputPwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);

        //récupération des informations rentré par l'utilisateur
        $user = User::find($inputUsername);

        if ($user == false) { //si l'utilisateur n'éxiste pas dans la base de donnée
            $messageError = "Cette utilisateur n'éxiste pas !";
        } else {
            //si l'utilisateur à rentré un mot de passe et si le mot de passe rentré correspond au hash du mot de passe stocké en base de donnée
            if (!empty($inputPwd) && password_verify($inputPwd, $user->pwd)) {
                $_SESSION['user_session'] = $inputUsername; //stockage du nom d'utilisateur dans une variable de session
                call('pages', 'home'); //affichage de l'accueil
            } else {//les mots de passes ne correspondent pas
                $messageError = "Le mot de passe est erroné !";
            }
        }
        if (!empty($messageError)) { //si il y a une erreur
            $_SESSION["message"] = ["danger" => $messageError];
            call('users', 'displayFormLogin'); //ré-affichage de la page de login (suppression des anciennes valeurs des champs du formualire)
        }
    }

    /**
     * déconnexion/suppression de la session
     *
     * @return void
     */
    public function logout(): void
    {
        //appel de la méthode logout
        User::logout();

        //utilisateur de base
        if (!isset($_SESSION["user_session"])) {
            $_SESSION["user_session"] = "Visiteur";
        }
        //affichge de la page d'accueil
        call('pages', 'home');
    }

    /**
     * liste de tous les posts
     *
     * @return void
     */
    public function list(): void
    {
        //appel de la méthode all (affichage de tous les utilisateurs)
        $users = User::all();
        require('views/users/listUser.php');
    }

    /**
     * vérifications puis insertion d'un utilisatur dans la base de donnée
     *
     * @return void
     */
    public function insert(): void
    {
        //filtrage et stockage des inputs du formaulaire d'inscription
        $inputUsername = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
        $inputPwd = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $inputConfPwd = filter_input(INPUT_POST, 'confPwd', FILTER_SANITIZE_STRING);

        if (!isset($inputUsername) || !isset($inputPwd) || !isset($inputConfPwd)) {
            call('pages', 'error');
        }

        //vérification de la correspondance des mots de passes entrés
        if ($inputPwd == $inputConfPwd) {
            //appel de la méthode d'insertion
            $user = User::insert($inputUsername, $inputPwd);
            if ($user) {
                if ($_SESSION["user_session"] == "Visiteur") { //si c'est un utilisateur lambda
                    //message de validation
                    $_SESSION["message"] = ["success" => "Votre compte à bien été créé !"];
                    //redirection au login pour qu'il puisse se connecter avec son compte juste créé
                    call('users', 'displayFormLogin');
                } else if ($_SESSION["user_session"] == "Admin") { //si l'utilisateur connecté est l'admin
                    $this->list(); //affichage de la liste des utilisateurs
                }
            } else { //sinon affichage de la page d'erreur
                call('pages', 'error');
            }
        } else { //message d'erreur
            $_SESSION["message"] = ["danger" => "Attention, les deux mots de passes ne sont pas identiques!"];
            call('users', 'displayFormInscription'); //ré-affichage du formulaire d'inscription (suppression des anciennes valeurs des champs)
        }
    }

    /**
     * mise à jour des informations d'un utilisateur
     *
     * @return void
     */
    public function update(): void
    {
        //filtrage et stockage des inputs du formaulaire de mise à jour
        $inputNewPwd = filter_input(INPUT_POST, 'newPwd', FILTER_SANITIZE_STRING);
        $inputConfPwd = filter_input(INPUT_POST, 'confPwd', FILTER_SANITIZE_STRING);
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $varId = filter_var($getId, FILTER_VALIDATE_INT);

        if (!isset($varId) || !isset($inputNewPwd) || !isset($inputConfPwd)) {
            call('pages', 'error');
        }

        //vérification de la correspondance des mots de passes entrés
        if ($inputNewPwd == $inputConfPwd) {
            //appel de la méthode de mise à jour
            $user = User::update($varId, $inputNewPwd);
            if ($user) {
                //message de validation
                $_SESSION["message"] = ["success" => "Votre mot de passe à bien été modifié !"];
                call('pages', 'home');
            } else { //erreur
                call('pages', 'error');
            }
        } else { //message d'erreur
            $_SESSION["message"] = ["danger" => "Attention, les deux mots de passes ne sont pas identiques!"];
            call('users', 'displayFormUpdate'); //ré-affichage du formulaire d'inscription (suppression des anciennes valeurs des champs)
        }
    }

    /**
     * suppression d'un utilisateur
     *
     * @return void
     */
    public function delete(): void
    {
        //filtrage de l'id de l'URL
        $getId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $varId = filter_var($getId, FILTER_VALIDATE_INT);
        if (!isset($varId)) {
            call('pages', 'error');
        }

        //appel de la méthode de suppression
        $user = User::delete($varId);
        if ($user) {
            //appel de la méthode list
            $this->list();
        } else { //erreur
            call('pages', 'error');
        }
    }

    //Affichage des formulaires

    /**
     * affichage du formulaire de login
     *
     * @return void
     */
    public function displayFormLogin(): void
    {
        require_once('views/users/login.php');
    }

    /**
     * affichage du formulaire de création
     *
     * @return void
     */
    public function displayFormCreate(): void
    {
        require('views/users/create.php');
    }

    /**
     * affichage du formulaire de création avec pour titre "Inscription"
     *
     * @return void
     */
    public function displayFormInscription(): void
    {
        //préscision du fait que le formulaire est utilisé pour l'inscription
        $utilisation = "inscription";
        require('views/users/create.php');
    }

    /**
     * affichage du formulaire de modification d'utilisateur
     *
     * @return void
     */
    public function displayFormUpdate(): void
    {
        $user = User::find($_SESSION["user_session"]);
        require('views/users/update.php');
    }
}
