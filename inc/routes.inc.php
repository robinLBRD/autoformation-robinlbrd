<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//fonction qui gère les différents controlleurs et leurs actions
function call($controller, $action) {
    require_once('./controllers/' . $controller . '_controller.php');

    //parcour des controlleurs
    switch ($controller) {
        case 'pages':
            //appel du model des statistiques
            require_once('models/statistiques.php');
            //création d'un PagesController
            $controller = new PagesController();
            break;
        case 'posts':
            //appel du model des posts
            require_once('models/post.php');
            //création d'un PostsController
            $controller = new PostsController();
            break;
        case 'users':
            //appel du model des users
            require_once('models/user.php');
            //création d'un UsersController
            $controller = new UsersController();
            break;
    }
    //appel de l'action donnée dans la classe de $controlleur
    $controller->{ $action }();
}

//varible contenant les différents controlleurs et leurs actions
$controllers = array('pages' => ['home', 'error'],
    'posts' => ['list', 'detail', 'insert', 'update', 'delete', 'displayFormUpdate', 'displayFormCreate'],
    'users' => ['list', 'detail', 'insert', 'update', 'delete', 'verifyLogin', 'logout', 'displayFormCreate', 'displayFormInscription', 'displayFormLogin', 'displayFormUpdate']);

//si le controlleur present dans l'url est un controlleur connu
if (array_key_exists($controller, $controllers)) {
    //si l'action demandé au controlleur est une acction connue
    if (in_array($action, $controllers[$controller])) {
        //appel de la fonction call du controlleur et de son action
        call($controller, $action);
    } else {
        //sinon affichage de l'erreur
        call('pages', 'error');
    }
} else {
    //sinon affichage de l'erreur
    call('pages', 'error');
}
