<?php

/**
 * Le contrôleur authentification va nous permettre d'utiliser 
 * toutes les actions liés à l'authentification
 * Connexion
 * Inscription
 * Deconnexion
 * ...
 */

if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    $action = 'connexion';
}

switch ($action) {
    case 'connexion': //Renvoyer la vue connexion
        {
            if (isset($_SESSION["estConnecte"]) && $_SESSION["estConnecte"]) {
                MessageInfo::AjouterMessageErreurEtRediriger("Vous êtes déjà connecté.", "index.php");
            }
            include("vue/v_connexion.php");
            break;
        }

    case 'inscription': // Renvoyer la vue inscription
        {
            if (
                isset($_SESSION["estConnecte"]) && $_SESSION["estConnecte"]
                && $_SESSION["id_droits"] != "Administrateur"
            ) {
                MessageInfo::AjouterMessageErreurEtRediriger("Vous êtes déjà connecté.", "index.php");
            }

            if (isset($_SESSION["id_droits"]) && $_SESSION["id_droits"] == "Administrateur") {
                $lesDroits = $blog->GetLesDroits();
            }
            include("vue/v_inscription.php");
            break;
        }

    case 'validerConnexion':  //Contrôler les paramètres envoyés par le formulaire de connexion et connecter l'utilisateur
        {
            $login          = htmlspecialchars($_REQUEST['login']);
            $password       = htmlspecialchars($_REQUEST['password']);
            $utilisateur    = $blog->Connect($login, $password);

            if (empty($utilisateur)) {
                MessageInfo::AjouterMessageErreurEtRetour("Le nom de l'utilisateur et/ou le mot de passe est incorrect");

                return;
            }

            $_SESSION["estConnecte"] = true;
            $_SESSION["id_droits"] = $blog->GetLibelleDroit($utilisateur["id_droits"]);
            $_SESSION["id"] = $utilisateur["id"];
            $_SESSION["login"] = $utilisateur["login"];
            MessageInfo::AjouterMessageReussiteEtRedirect("Vous êtes maintenant connecté.", "index.php");

            break;
        }

    case 'validerInscription': //Valider le formulaire d'inscription
        {
            $login              = htmlspecialchars($_REQUEST['login']);
            $password           = htmlspecialchars($_REQUEST['password']);
            $confirmerPassword  = htmlspecialchars($_REQUEST['confirmerPassword']);
            $email              = htmlspecialchars($_REQUEST['email']);
            $user               = $blog->getUnUtilisateurParLogin($login);

            if ($password != $confirmerPassword) {
                MessageInfo::AjouterMessageErreurEtRetour("Les mots de passe ne correspondent pas.");
            } else {
                if (empty($user)) {
                    if (isset($_REQUEST["droits"])) {
                        $droits = $_REQUEST["droits"];
                        $blog->Inscription($login, $password, $email, $droits);
                        MessageInfo::AjouterMessageReussiteEtRedirect("L'utilisateur " . $login . " a bien été ajouté.", "index.php?controleur=admin&action=utilisateur");
                    } else {
                        $blog->Inscription($login, $password, $email, 1);
                        MessageInfo::AjouterMessageReussiteEtRedirect("Vous êtes maintenant inscrit en tant que " . $login . ". Veuillez vous connecter ! ", "index.php?controleur=authentification&action=connexion");
                    }
                }
            }
            break;
        }

    case 'deconnexion': // Deconnecter l'utilisateur
        {
            if (!isset($_SESSION["estConnecte"])) {
                MessageInfo::AjouterMessageErreurEtRediriger("Une erreur est survenue. Vous ne pouvez pas vous déconnecté.", "index.php");
            }

            MessageInfo::AjouterMessageReussiteEtRedirect("Vous êtes maintenant deconnecté", "index.php");
            $_SESSION["estConnecte"] = false;
            session_destroy();
            break;
        }
}
