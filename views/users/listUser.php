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
                <h2>Liste de tous les utilisateurs</h2>
            </div>
            <div class="col-3">
                <a class="btn btn-primary " href='?controller=users&action=displayFormCreate'><i class="fas fa-plus-circle"></i> Créer un nouvel utilisateur</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr class="d-flex">
                    <th scope="col" class="col-md-3">Numéro</th>
                    <th scope="col" class="col-md-7">Nom</th>
                    <th scope="col" class="col-md-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //parcour de tout les posts de $posts
                foreach ($users as $user) {
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-3'>" . $user->id . "</td>";
                    echo "<td class='col-md-7'>" . $user->user . "</td>";
                    echo "<td class='col-md-2'>";
                ?>
                    <a class="btn btn-danger" dataAuteur="<?php echo "Utilisateur : " . $user->user; ?>" data-suppression="?controller=users&action=delete&id=<?php echo $user->id; ?>" href='#modalDelete' data-toggle="modal"><i class="fa fa-trash"></i></a>
                <?php
                    echo "</td>";
                }
                ?>
            </tbody>
        </table>
        <?php
        require_once("./inc/affichageMessage.inc.php");
        ?>

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
                        <p>Voulez-vous vraiment suprimer cet utilisateur ?</p>
                        <p id="auteur"></p>
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