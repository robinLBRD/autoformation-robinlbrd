<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

//affichage du message d'erreur de la session
if (!empty($_SESSION["message"])) {
    $mesMessages = $_SESSION["message"];
    foreach ($mesMessages as $key => $value) {
        echo '<br><div class="alert alert-' . $key . ' alert-dismissible fade show" role="alert">
                    ' . $value . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
    }
    $_SESSION["message"] = [];
}
?>