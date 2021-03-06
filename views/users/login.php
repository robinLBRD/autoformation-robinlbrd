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
    <h2>Connectez-vous !</h2>
    <form method="POST" action="?controller=users&action=verifyLogin">
      <div class="form-group">
        <label for="username" class="label">Nom d'utilisateur :</label>
        <input type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="pwd" class="label">Mot de passe :</label>
        <input type="password" class="form-control" name="pwd">
      </div>
      <input type="submit" class="btn btn-success" name="valider" value="Valider">
    </form>
    <?php
    require_once("./inc/affichageMessage.inc.php");
    ?>
  </div>
</div>