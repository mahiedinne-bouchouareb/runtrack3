<form action="index.php?controleur=authentification&action=validerInscription" method="POST">
  <fieldset class="container mt-1 border border-5 p-2 rounded">
    <legend class="float-none w-auto p-2"><?= (isset($_SESSION["id_droits"]) && $_SESSION["id_droits"] == "Administrateur") ? "Ajouter utilisateur" : "S'inscrire" ?></legend>
    <div class="row justify-content-center fs-5 text-center">
      <div class="form-group col-md-7">
        <label for="login">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="login" placeholder="Entrez un nom d'utilisateur" required>
      </div>
      <div class="form-group col-md-7">
        <label for="login">Prenom d'utilisateur</label>
        <input type="text" class="form-control" name="login" placeholder="Entrez un Prenom d'utilisateur" required>
      </div>
      <div class="form-group col-md-7 mt-2">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" placeholder="Entrez un mot de passe" required>
      </div>
      <div class="form-group col-md-7 mt-2">
        <label for="confirmerPassword">Confirmer votre mot de passe</label>
        <input type="password" class="form-control" name="confirmerPassword" placeholder="Mot de passe" required>
      </div>
      <div class="form-group col-md-7 mt-2">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Entrez votre email" required>
      </div>
      <?php if (isset($_SESSION["id_droits"]) && $_SESSION["id_droits"] == "Administrateur") : ?>
        <div class="form-group col-md-7 mt-2">
          <label for="droits">Droits</label>
          <select class="form-select" name="droits">
            <?php foreach ($lesDroits as $unDroit) : ?>
              <option value="<?= $unDroit["id"] ?>"><?= $unDroit["nom"] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      <?php endif; ?>
    </div>
    <div class="btn-group-md text-center mt-3">
      <button type="submit" class="btn btn-primary">
        <?= (isset($_SESSION["id_droits"]) && $_SESSION["id_droits"] == "Administrateur") ? "Ajouter" : "S'inscrire" ?>
      </button>
    </div>
  </fieldset>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='script.js'></script>