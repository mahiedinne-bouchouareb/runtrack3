<?php

switch ($_REQUEST["action"]) {
    case 'connexion': {
            include("./vue/connexion.php");
            break;
        }
    case 'inscription': {
            include("./vue/inscription.php");
            break;
        }
    case 'deconnexion': {
            session_destroy();
            header("Location: index.php");
            break;
        }
}
