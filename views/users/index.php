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
                <a class="btn btn-primary " href='?controller=posts&action=create'><i class="fas fa-plus-circle"></i> Créer un nouvel utilisateur</a>
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
                    echo "<td class='col-md-3'>" . $users->id . "</td>";
                    echo "<td class='col-md-7'>" . $users->user . "</td>";
                    echo "<td class='col-md-2'>";
                ?>
                    <a class="btn btn-primary" href='?controller=users&action=detail&id=<?php echo $post->id; ?>'><i class="fas fa-info-circle"></i></a>
                    <a class="btn btn-primary" href='?controller=users&action=edit&id=<?php echo $post->id; ?>'><i class="fa fa-pen"></i></a>
                    <a class="btn btn-danger" data-suppression="?controller=users&action=delete&id=<?php echo $post->id; ?>" href='#modalDelete' data-toggle="modal"><i class="fa fa-trash"></i></a>

                <?php
                    echo "</td>";
                }
                ?>
            </tbody>
        </table>
        <?php
        if (!empty($_SESSION["message"])) {
            $mesMessages = $_SESSION["message"];
            foreach ($mesMessages as $key => $value) {
                echo '<div class="alert alert-' . $key . ' alert-dismissible fade show" role="alert">
                        ' . $value . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
            }
            $_SESSION["message"] = [];
        }
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
                        <p>Voulez-vous vraiment suprimer ce post ?</p>
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