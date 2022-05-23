<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./public/css/bootstrap.min.css">
    <script src="public/js/script.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-light bg-warning">
            <div class="container-fluid">
                <h1 class="text-dark mx-3">Bonjour</h1>
                <nav class="text-dark d-flex">
                    <?php if (isset($_SESSION['connected'])) : ?>
                        <h2 class="text-light"> Bonjour, <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></h2>
                        <a href="index.php?controleur=auth&action=deconnexion" class="btn btn-sm btn-outline-danger">Deconnexion</a>
                    <?php else : ?>
                        <div class="container">
                            <div class="col justify-content-around">
                                <a href="index.php?controleur=auth&action=inscription" class="btn btn-sm btn-outline-secondary">Inscription</a>
                                <a href="index.php?controleur=auth&action=connexion" class="btn btn-sm btn-outline-primary">Connexion</a>
                            </div>
                        </div>
                    <?php endif ?>
                </nav>
            </div>
        </nav>
    </header>
    <main class="d-flex justify-content-center my-5">