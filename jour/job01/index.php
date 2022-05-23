<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
</head>

</html>
<?php
session_start();
if (isset($_SESSION['login'])) {
    session_destroy();
    header('refresh:0');
}

//connexion base de donner


if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $requet = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login='$login' and password='$password'");
    $resulta = mysqli_fetch_array($requet, MYSQLI_ASSOC);
    // vérifier si la connexion est réalisé
    if ($resulta != null) {
        $_SESSION['login'] = $login;
        //$_SESSION['password'] =$password;
        // On redirige le visiteur vers la page d'accueil 
        header("Location: index.php");
        if ($login === 'admin' &&  $password === 'admin') {
            $_SESSION['login'] = $login;
            header('location: admin.php');
        } else {
            $_SESSION['login'] = $login;
            header('location: index.php');
        }
    } else {
        echo "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
}


?>

<body class="connexionBackground">
    <header class="btIndex">

        <a id="accueil" href="index.php">ACCUEIL</a>
    </header>
    <div id="main">

        <form method="post" action="#" id="connexionForm">
            <h2>Connexion</h2>
            <input type="text" class="box-input" name="login" autocomplete="off" placeholder="login">
            <input type="password" class="box-input" name="password" autocomplet="off" placeholder="password">
            <input type="submit" value="Connexion " name="submit" class="box-button">
            <p class="box-register">Vous êtes nouveau ici <a href="vue/v_inscription.php">S'inscrire</a></p>
        </form>
    </div>