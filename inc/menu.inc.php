<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */

 //Menu principale afficher dans la barre de navigation
?>
<li class="nav-item">
    <a class="navbar-brand" href='?controller=pages&action=home'>Accueil</a>
</li>
<li class="nav-item">
    <a class="nav-link" href='?controller=posts&action=list'>Posts</a>
</li>
<?php
if (isset($_SESSION['user_session']) && $_SESSION['user_session'] != "Visiteur") { //si un utilisateur est connecté et n'est pas Visiteur
    if ($_SESSION['user_session'] == 'Admin') { //si c'est ladministrateur
?>
        <li class="nav-item">
            <a class="nav-link" href='?controller=users&action=list'>Users</a>
        </li>
    <?php } ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mon compte</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="?controller=users&action=displayFormUpdate">Modifier mon mot de passe</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href='?controller=users&action=logout'>Logout</a>
    </li>
<?php } else { ?>
    <li class="nav-item">
        <a class="nav-link" href='?controller=users&action=displayFormLogin'>Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href='?controller=users&action=displayFormInscription'>Inscription</a>
    </li>
<?php } ?>