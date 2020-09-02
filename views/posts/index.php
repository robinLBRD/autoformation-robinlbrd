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
                <a class="btn btn-primary" href='?controller=posts&action=update&id=<?php echo $post->id; ?>'>Update le post</a>
                <a class="btn btn-danger" href='?controller=posts&action=delete&id=<?php echo $post->id; ?>'>Supprimer le post</a>
            </p>
        <?php
        }
        ?>
        <br><a class="btn btn-primary" href='?controller=posts&action=create'>Créer un nouveau post</a><br><br>
    </div>
</div>