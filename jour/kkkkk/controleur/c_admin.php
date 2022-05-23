<?php

/**
 * Le contrôleur admin va gérer toutes les actions propres aux admins 
 * Il va permettre aux utilisateurs autorisés d'accéder à la page d'administration 
 * 
 */


/**
 * Si l'utilisateur n'est pas un admistrateur, alors on le redirige à l'accueil avec un message d'erreur 
 */
if (!isset($_SESSION["id_droits"]) || $_SESSION["id_droits"] != "Administrateur") {
    MessageInfo::AjouterMessageErreurEtRediriger("Vous n'êtes pas autorisé à accéder à cette page.", "index.php");
}

/**
 * On stocke dans $action le paramètre "action" de la requête si il existe
 * 
 * Sinon on redirige vers l'accueil
 */
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
} else {
    header("Location: index.php");
}

/**
 * En fonction de la valeur de $action, 
 * le contrôleur renvoie les données et la vue correspondante
 */
switch ($action) {
    case 'utilisateur': {
            /**
             * la fonction array_filter permet de filtrer un tableau 
             * en fonction du predicat (la condition qui permet de filtrer ou non la valeur)
             * 
             * Elle prend deux paramètres : 
             *  - Le tableau que nous voulons filtrer
             *  - Une fonction anonyme (qui ne porte pas de nom) 
             *    qui la valeur quand la condition (predicat) est vraie
             *    
             * 
             * Ici nous voulons filtrer le tableau pour afficher tous les utilisateurs sauf
             * nous même (l'utilisateur avec lequel nous sommes actuellement connecté)
             */
            $lesUtilisateurs = array_filter($blog->GetLesUtilisateurs(), function ($unUtilisateur) {
                return $unUtilisateur["id"] != $_SESSION["id"]; //Predicat
            });
            include("vue/v_listeUtilisateur.php"); //On affiche la vue utilisateur
            break;
        }

    case 'categorie': {
            $lesCategories = $blog->GetLesCategories();
            include("vue/v_listeCategorie.php");
            break;
        }
    case 'article': {
            $lesArticles = $blog->GetLesArticles();
            include("vue/v_listeArticle.php");
            break;
        }
    case 'droit': {
            $lesDroits = $blog->GetLesDroits();
            include("vue/v_listeDroit.php");
            break;
        }
}
