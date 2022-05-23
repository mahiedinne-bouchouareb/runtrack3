<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>inscription</title>
    <link rel="stylesheet" href="public/style/css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="https://github.com/mahiedinne-bouchouareb/runtrack3.git">
</head>
<?php
if (!isset($_SESSION['login'])) {
?>
    <li><a href="vue/v_inscription.php">Inscription</a></li>
    <li><a href="vue/v_connexion.php">Connexion</a></li>
<?php }
?>

<?php if (isset($_SESSION['login'])) { ?>
    <li><a href="vue/v_connexion.php">Déconnexion</a></li>
<?php } ?>
</ul>
</header>