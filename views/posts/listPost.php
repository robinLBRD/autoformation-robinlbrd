<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */
?>
<!-- listing des pots de la base de donnée -->
<div class="jumbotron">
    <div class="container mt-4">
        <div class="row">
            <div class="col-9">
                <h2>Liste de tous les posts</h2>
            </div>
            <div class="col-3">
                <a class="btn btn-primary " href='?controller=posts&action=displayFormCreate'><i class="fas fa-plus-circle"></i> Créer un nouveau post</a>
            </div>
        </div>

        <!-- formulaire de recherche de posts (pas utilisé)
        <form action="" method="get" class="border broder-primary rounded p-3 mt-2">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="recherche" name="recherche">
                </div>
                <div class="col">
                    <select name="" class="form-control">

                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-success btn-block">Rechercher</button>
                </div>
            </div>
        </form>-->

        <table class="table table-striped">
            <thead>
                <tr class="d-flex">
                    <?php if ($_SESSION["user_session"] == "Admin") { ?>
                        <th scope="col" class="col-md-3">Auteur</th>
                        <th scope="col" class="col-md-7">Message</th>
                        <th scope="col" class="col-md-2">Actions</th>
                    <?php } else { ?>
                        <th scope="col" class="col-md-3">Auteur</th>
                        <th scope="col" class="col-md-9">Message</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                //parcour de tout les posts de $posts
                foreach ($posts as $post) {
                    if ($_SESSION["user_session"] == "Admin") {
                        echo "<tr class='d-flex'>";
                        echo "<td class='col-md-3'>" . $post->author . "</td>";
                        echo "<td class='col-md-7'>" . $post->content . "</td>";
                        echo "<td class='col-md-2'>";
                ?>
                        <a class="btn btn-primary" href='?controller=posts&action=detail&id=<?php echo $post->id; ?>'><i class="fas fa-info-circle"></i></a>
                        <a class="btn btn-primary" href='?controller=posts&action=displayFormUpdate&id=<?php echo $post->id; ?>'><i class="fa fa-pen"></i></a>
                        <a class="btn btn-danger" dataAuteur="<?php echo "Auteur : " . $post->author; ?>" dataMessage="<?php echo "Message : " . $post->content ?>" data-suppression="?controller=posts&action=delete&id=<?php echo $post->id; ?>" href='#modalDelete' data-toggle="modal"><i class="fa fa-trash"></i></a>

                <?php
                        echo "</td>";
                    } else {
                        echo "<tr class='d-flex'>";
                        echo "<td class='col-md-3'>" . $post->author . "</td>";
                        echo "<td class='col-md-9'>" . $post->content . "</td>";
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        require_once("./inc/affichageMessage.inc.php");
        ?>

        <!-- Modale de confirmation de suppression -->
        <div id="modalDelete" class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmer la suppression</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Voulez-vous vraiment supprimer ce post ?</p>
                        <p id="auteur"></p>
                        <p id="message"></p>
                    </div>
                    <div class="modal-footer">
                        <a href="" id="btnSuppr" class="btn btn-warning">Oui</a>
                        <a class="btn btn-primary" data-dismiss="modal">Annuler</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>