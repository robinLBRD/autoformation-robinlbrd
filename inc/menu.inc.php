<?php
/*
  Auteur : Robin Laborde
  Nom du projet : autoformation-RobinLBRD
  Description : site web qui utilise une base de donnée et une structure M.V.C.
  Version : 02
  Classe : I.FDA.P3C
 */
 ?>
 
<p><a href='./accueil.php'>Home</a></p>
<p><a href='?controller=posts&action=list'>Posts</a></p>
<?php
if (isset($_SESSION['user_session'])) {
    if ($_SESSION['user_session'] == 'Admin') {
?>
        <!--<p><a href='?controller=users&action=list'>Users</a></p>-->
    <?php } ?>
    <p><a href='?controller=users&action=logout'>Logout</a></p>
<?php } else { ?>
    <p><a href='?controller=users&action=login'>Login</a></p>
    <p><a href='?controller=users&action=inscription'>Inscription</a></p>
<?php } ?>