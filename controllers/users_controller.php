<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//controlleur des "users"
class UsersController
{
    /**
     * affichage du formulaire de login
     *
     * @return void
     */
    public function login(): void
    {
        //formulaire de login
        require_once('views/users/login.php');
    }

    /**
     * verification de l'éxistance du user dans la base de donnée et comparaison/varification des deux mots de passes
     */
    public function verifyLogin()
    {
        $messageError = null; //stockage de la raison de l'erreur
        //filtrage et stockage des inputs du formaulaire de login
        $inputUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $inputPwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_SPECIAL_CHARS);

        //récupération des informations de l'utilisateur rentré par l'utilisateur
        $user = User::find($inputUsername);

        if ($user == false) { //si l'utilisateur n'éxiste pas dans la base de donnée
            $messageError = "Cette utilisateur n'éxiste pas !";
        } else {
            //si l'utilisateur à rentré un mot de passe et si le mot de passe rentré correspond au hash du mot de passe stocké en base de donnée
            if (!empty($_POST['pwd']) && password_verify($inputPwd, $user->pwd)) {
                $_SESSION['user_session'] = $inputUsername; //stockage du nom dans une variable de session
                return call('pages', 'home'); //affichage de l'accueil
            } else {
                $messageError = "Le mot de passe est erroné !";
            }
        }
        if (!empty($messageError)) { //si il y a une erreur
            $_SESSION["message"] = ["danger" => $messageError];
            return call('users', 'login'); //ré-affichage de la page de login avec l'erreur
        }
    }

    /**
     * logout et affichage de l'accueil
     */
    public function logout()
    {
        User::logout();
        return call('pages', 'home');
    }

    /**
     * affichage du formualire d'inscription
     */
    public function inscription()
    {
        require('views/users/create.php');
    }

    public function insert()
    {
        if (!isset($_POST['username']) || !isset($_POST['pwd'])) {
            return call('pages', 'error');
        }

        $user = User::insert($_POST['username'], $_POST['pwd']);
        if ($user) {
            require_once('views/users/login.php');
        } else {
            return call('pages', 'error');
        }
    }

    public function list() {
        $users = User::all();
        require('views/users/index.php');
    }
}
