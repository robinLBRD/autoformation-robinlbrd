<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestionnire de Posts</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./views/css/bootstrap.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<main role="main">
    <!-- appel du fichier inc/routes.inc.php qui vas afficher les informations en fonction du controlleur et l'action choisie-->
    <?php require_once('./inc/routes.inc.php'); ?>
</main>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
        <!-- fixed-top -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <?php require_once("./inc/menu.inc.php"); ?>
            </ul>
            <!-- Ajout d'un input pour rechercher (pas utilisé)
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>-->
        </div>
    </nav>

    <!-- pied de page -->
    <footer class="container">
        <p>&copy; Robin E. Laborde I.FDA.P3C 2020-2021</p>
    </footer>

    <!--fontawesome script-->
    <script src="https://kit.fontawesome.com/f86d776f57.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $("a[data-suppression]").click(function() {
            var lien = $(this).attr("data-suppression"); //recup du lien stocker dans les boutons poubelle des posts
            $("#btnSuppr").attr("href", lien); // met le lien dans le href du bouton supprmier de la modale

            var auteur = $(this).attr("dataAuteur"); //recup des infos stocker dans les boutons poubelle des posts/utilisateurs
            $("#auteur").text(auteur); // met le nom de l'auteur dans le <p> de la modale 

            var message = $(this).attr("dataMessage"); //recup des infos stocker dans les boutons poubelle des posts
            $("#message").text(message); // met le contenu du message dans le <p> de la modale
        });
    </script>
</body>

</html>