<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */
?>

<!-- formulaire de création d'un utilisateur -->
<div class="jumbotron">
    <div class="container mt-4">
        <h2><?php if (isset($utilisation)) { ?>
                Inscrivez-vous :
            <?php } else { ?>
                Ajouter un nouvel utilisateur :
            <?php } ?></h2>
        <form action="?controller=users&action=insert" method="POST">
            <div class="form-group">
                <label for="username">Utilisateur : </label>
                <input type="text" class="form-control" id="userame" name="userName" />
            </div>
            <div class="form-group">
                <label for="pwd">Mot de passe : </label>
                <input type="password" class="form-control" id="pwd" name="password" />
            </div>
            <div class="form-group">
                <label for="confPwd">Confirmation : </label>
                <input type="password" class="form-control" id="confPwd" name="confPwd" />
            </div>
            <input type="submit" class="btn btn-success" name="envoyer" />
        </form>
        <?php
        require_once("./inc/affichageMessage.inc.php");
        ?>
    </div>
</div>