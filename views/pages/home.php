<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//page d'accueil
?>
<div class="jumbotron">
  <div class="container">
    <!-- Affichage du nom d'utilisateur si il est logué -->
    <h1 class="display-4">Bienvenue <?php $unserName = isset($_SESSION['user_session']) ? $_SESSION['user_session'] : 'Visiteur';
                                    echo $unserName; ?> !</h1>
    <p>Voici mon site de gestion de post en structure MVC</p>
    <?php require_once("./inc/affichageMessage.inc.php") ?>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card border-primary mb-3">
        <div class="card-header">Statistiques générales</div>
        <div class="card-body">
          <div class="card-text">
            <?php if ($_SESSION["user_session"] == "Admin") { ?>
              <a href="?controller=users&action=list">
                <span class="badge badge-success"><?php echo Statistique::nbrUtilisateurs(); ?></span>
                utilisateurs
              </a>
            <?php } else { ?>
              <span class="badge badge-success"><?php echo Statistique::nbrUtilisateurs(); ?></span>
              utilisateurs
            <?php } ?>
          </div>
          <div class="card-text mt-2">
            <a href="?controller=posts&action=list">
              <span class="badge badge-success"><?php echo Statistique::nbrPosts(); ?></span>
              posts
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>