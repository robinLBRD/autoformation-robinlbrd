<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

//filtrage des valeurs des inputs pour ensuite les ré-affichers
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>
<!-- formulaire de login -->
<div class="jumbotron">
  <div class="container ml-4">
    <h2>Connectez-vous !</h2>
    <form method="POST">
      <div class="form-group">
        <label for="username" class="label">Nom d'utilisateur :</label><br>
        <input type="text" class="form-control" name="username" value="<?= $username ?>">
      </div>
      <div class="form-group">
        <label for="pwd" class="label">Mot de passe :</label><br>
        <input type="password" class="form-control" name="pwd" value="<?= $pwd ?>">
      </div>
      <input type="submit" class="btn btn-success" name="valider" value="Valider">
    </form>
  </div>
</div>