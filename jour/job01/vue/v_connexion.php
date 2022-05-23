<form action="index.php?controleur=authentification&action=validerConnexion" method="POST">
    <fieldset class="container mt-5 border border-5 p-2 rounded">
        <legend class="float-none w-auto p-2">Connexion</legend>
        <div class="row justify-content-center fs-5 text-center">
            <div class="form-group col-md-8 mt-4 mr-3">
                <label for="login">Login</label>
                <input class="form-control" type="text" name="login" required>
            </div>
            <div class="form-group col-md-8 mt-4 mr-3">
                <label for="password">Mot de passe</label>
                <input class="form-control" type="password" name="password" required>
            </div>
        </div>
        <div class="btn-group-md text-center mt-3">
            <input class="btn btn-primary" type="submit">
        </div>
    </fieldset>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src='script.js'></script>