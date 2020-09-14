<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */
?>
<!-- formulaire de login -->
<div class="jumbotron">
    <div class="container mt-4">
        <h2>Modifier le mot de passe :</h2>
        <form action="?controller=users&action=update&id=<?php echo $user->id; ?>" method="POST">
            <div class="form-group">
                <label for="user">Nom d'utilisateur :</label>
                <input type="text" name="userName" class="form-control" value="<?php echo $user->user; ?>" readonly />
            </div>
            <div class="form-group">
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" class="form-control" name="newPwd" />
            </div>
            <div class="form-group">
                <label for="password">Confirmer le mot de passe :</label>
                <input type="password" class="form-control" name="confPwd" />
            </div>
            <input type="submit" class="btn btn-success" name="btnsubmit" value="Mettre à jour" />
        </form>
        <?php require_once("./inc/affichageMessage.inc.php") ?>
    </div>
</div>