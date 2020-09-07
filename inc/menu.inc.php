<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */
?>
<li class="nav-item">
    <a class="navbar-brand" href='./accueil.php'>Accueil</a>
</li>
<li class="nav-item">
    <a class="nav-link" href='?controller=posts&action=list'>Posts</a>
</li>
<?php
if (isset($_SESSION['user_session'])) {
    if ($_SESSION['user_session'] == 'Admin') {
?>
        <!--<p><a href='?controller=users&action=list'>Users</a></p>-->
    <?php } ?>
    <li class="nav-item">
        <a class="nav-link" href='?controller=users&action=logout'>Logout</a>
    </li>
<?php } else { ?>
    <li class="nav-item">
        <a class="nav-link" href='?controller=users&action=login'>Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href='?controller=users&action=inscription'>Inscription</a>
    </li>
<?php } ?>