<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */
?>
<!-- formulaire de création d'un post -->
<div class="jumbotron">
  <div class="contrainer mt-4">
    <h2>Créez un post !</h2>
    <div class="ml-3">
      <form method="POST">
        <label for="auteur" class="label">Auteur :</label><br>
        <input type="text" class="form-control" id="auteur" name="auteur"><br />
        <label for="objet" class="label">Objet :</label><br>
        <input type="text" class="form-control" id="objet" name="objet"><br />
        <input type="submit" class="btn btn-success" name="valider" value="Valider l'ajout du post">
      </form>
      <p><?= $message ?></p>
    </div>
  </div>
</div>