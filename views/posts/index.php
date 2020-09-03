<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */
?>

<!-- listing des pots de la base de donnée -->
<div class="jumbotron">
    <div class="container mt-4">
        <h2>Voici la liste de tous les auteurs de posts :</h2>

        <?php
        //parcour de tout les posts de $posts
        foreach ($posts as $post) {
        ?>
            <p>
                <?php
                echo "<h4 class=\"pl-3 mt-4\">" . $post->author . "</h4>";
                ?>
                <a class="btn btn-primary" href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Détail du post</a>
                <a class="btn btn-primary" href='?controller=posts&action=edit&id=<?php echo $post->id; ?>'>Mettre à jour le post</a>
                <a class="btn btn-danger" href='#modalDelete' data-toggle="modal">Supprimer le post</a>
            </p>
        <?php
        }
        ?>
        <br><a class="btn btn-primary" href='?controller=posts&action=create'>Créer un nouveau post</a><br><br>

        <div id="modalDelete" class="modal" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmer la suppression</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Voulez-vous vraiment suprimer ce post ?</p>
            </div>
            <div class="modal-footer">
              <a href="?controller=posts&action=delete&id=<?php echo $post->id; ?>" class="btn btn-warning">Oui</a>
              <a class="btn btn-primary" data-dismiss="modal">Annuler</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>