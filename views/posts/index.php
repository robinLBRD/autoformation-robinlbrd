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
        <div class="row">
            <div class="col-9">
                <h2>Liste de tous les posts</h2>
            </div>
            <div class="col-3">
                <a class="btn btn-primary " href='?controller=posts&action=create'><i class="fas fa-plus-circle"></i> Créer un nouveau post</a>
            </div>
        </div>

        <!--
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
                    <th scope="col" class="col-md-3">Auteur</th>
                    <th scope="col" class="col-md-7">Message</th>
                    <th scope="col" class="col-md-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //parcour de tout les posts de $posts
                foreach ($posts as $post) {
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-3'>" . $post->author . "</td>";
                    echo "<td class='col-md-7'>";
                    for ($i = 0; $i < strlen($post->content); $i++) {
                        //à àmélioré car ne fonctionne pas en responsive
                        if ($i >= 80) {
                            echo " ...";
                            break;
                        }
                        echo $post->content[$i];
                    }
                    echo "</td>";
                    echo "<td class='col-md-2'>";
                ?>
                    <a class="btn btn-primary" href='?controller=posts&action=show&id=<?php echo $post->id; ?>'><i class="fas fa-info-circle"></i></a>
                    <a class="btn btn-primary" href='?controller=posts&action=edit&id=<?php echo $post->id; ?>'><i class="fa fa-pen"></i></a>
                    <a class="btn btn-danger" data-suppression="?controller=posts&action=delete&id=<?php echo $post->id; ?>" href='#modalDelete' data-toggle="modal"><i class="fa fa-trash"></i></a>

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