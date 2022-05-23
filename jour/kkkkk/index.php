<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/style/bootstrap.min.css"> <!-- Inclure le fichier css prédefinie par bootstrap -->
  <link rel="stylesheet" href="public/style/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"> <!-- Importer la bibliothèque d'icones -->
  <title>Blog</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <div class="mb-5">
    <?php session_start() ?>

    <body>

      <main>
        <?php if (@$_SESSION['prenom']) { ?>
          <p>Bonjour <?= $_SESSION['prenom'] ?> </p>
        <?php
        } else { ?>
          <button id='s_inscrire'>S'INSCRIRE</button>
          <button id='se_connecter'>SE CONNECTER</button>
        <?php
        }
        ?>
      </main>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src='script.js'></script>
    </body>

</html>