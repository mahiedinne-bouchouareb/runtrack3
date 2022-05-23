<?php

/**
 * Cette classe utilisateur est le modèle du projet
 * 
 * Elle créé un lien étroit avec la base de données et fait principalement des requetes 
 * vers cette dernière et rien d'autre 
 * 
 * Le contrôleur l'utilise pour récuperer des informations en tout genre
 */
class utilisateur
{
    /**
     * Les attributs de la classe 
     * Ils sont toujours privés
     * 
     */

    /**
     *
     * $pdoBlog correspond à la connexion à la base de données via la classe prédefinie en
     * PHP, la classe PDO
     */
    private static $pdoBlog;

    /**
     * $utilisateur conservera l'instance unique de la classe utilisateur
     */
    private static $utilisateur;

    /**
     * Les méthodes de la classe sont les fonctions de la classe
     * Elles peuvent être public ou privé
     */

    /**
     * Le constructeur de la classe est la première methode qui est appelée au 
     * moment de l'instanciation de la classe (création d'un objet avec new NomDeClasse())
     * 
     * En general, le constructeur est public mais il y a des cas où on peut le mettre 
     * en privé pour empecher la création de plusieurs objet
     * 
     * Nous voulons créer qu'une seule connexion à la base de donnée, on a donc 
     * tout intéret qu'il n'y ait qu'un seul objet utilisateur
     * 
     * C'est pourquoi, nous le mettons en privé
     * Nous instancierons la classe utilisateur grace à la methode getBlog() qui elle est public
     */
    private function __construct()
    {
        utilisateur::$pdoBlog = new PDO('mysql:host=localhost;dbname=utilisateur', 'root', '');
        utilisateur::$pdoBlog->query("SET CHARACTER SET utf8");
        utilisateur::$pdoBlog->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        utilisateur::$pdoBlog->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        utilisateur::$pdoBlog->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
    }

    /**
     * Contrairement au constructeur, le destructeur permet de détruire
     *  l'objet afin qu'il ne soit plus utilisable
     *
     */
    public function __destruction()
    {
        utilisateur::$utilisateur = null;
    }

    /**
     * S'il n'existe pas d'instance de utilisateur, nous en créons une
     * Sinon, nous ne faisons que renvoyer l'instance existance 
     * 
     * De cette façon, nous nous assurons qu'il n'existera qu'une seule et unique instance
     * de utilisateur
     * 
     * Meme si nous appelons getBlog() à plusieurs reprises, nous aurons toujours
     * la même instance de utilisateur
     * 
     * Ce type de classe qui s'instancie qu'une seule fois s'appelle 
     * un Singleton
     */
    public static function getBlog()
    {
        if (utilisateur::$utilisateur == null) {
            utilisateur::$utilisateur = new utilisateur();
        }
        return utilisateur::$utilisateur;
    }

    public function Inscription($login, $password, $email, $droits)
    {
        $req = "INSERT INTO utilisateurs (login, password, email, id_droits)
                VALUES (:login, :password, :email, :droits)";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ':login'       => $login,
            ':password'    => $password,
            ':email'       => $email,
            ':droits'      => $droits
        ]);
    }

    public function Connect($login, $password)
    {
        $req = "SELECT  *                
                FROM    utilisateurs         
                WHERE   login           = :login
                &&      password        = :password";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ':login'     => $login,
            ':password'  => $password
        ]);
        return $query->fetch();
    }

    public function GetLibelleDroit($id)
    {
        $req = "SELECT  nom
                FROM    droits
                WHERE   id = :id";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ':id'  => $id
        ]);
        $resultat = $query->fetch();
        return $resultat["nom"];
    }

    public function GetUnUtilisateurParLogin($login)
    {
        $req = "SELECT  *
                FROM    utilisateurs
                WHERE   login = :login";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([':login' => $login]);
        return $query->fetch();
    }

    public function GetUnUtilisateurParId($id)
    {
        $req = "SELECT  *
                FROM    utilisateurs
                WHERE   id = :id";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([':id' => $id]);
        return $query->fetch();
    }

    public function GetLesUtilisateurs()
    {
        $req = "SELECT  *
                FROM    utilisateurs";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute();
        return $query->fetchAll();
    }
    public function GetLesDroits()
    {
        $req = "SELECT      *
                FROM        droits
                ORDER BY    id DESC";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute();
        return $query->fetchAll();
    }

    public function GetUnDroitParId($idDroit)
    {
        $req = "SELECT  *
                FROM    droits
                WHERE   id = :idDroit";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":idDroit" => $idDroit
        ]);

        return $query->fetch();
    }

    public function GetUnDroitParNom($nomDroit)
    {
        $req = "SELECT  *
                FROM    droits
                WHERE   nom = :nomDroit";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":nomDroit" => $nomDroit
        ]);

        return $query->fetch();
    }

    public function SupprimerDroit($id)
    {
        $req = "DELETE 
                FROM    droits
                WHERE   id = :id";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":id" => $id
        ]);
    }

    public function AjouterDroit($idDroit, $nomDroit)
    {
        $req = "INSERT INTO droits (id, nom)
                VALUES (:idDroit, :nomDroit)";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":idDroit"  => $idDroit,
            ":nomDroit" => $nomDroit
        ]);
    }

    public function ModifierDroit($id, $nom)
    {
        $req = "UPDATE  droits
                SET     id  = :idDroit,
                        nom = :nomDroit
                WHERE   id  = :idDroit";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":idDroit"  => $id,
            ":nomDroit" => $nom
        ]);
    }

    public function GetLesUtilisateursQuiPossedentCeDroit($idDroit)
    {
        $req = "SELECT  *
                FROM    utilisateurs
                WHERE   id_droits = :idDroit";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":idDroit" => $idDroit
        ]);

        return $query->fetchAll();
    }

    public function SupprimerUtilisateur($id)
    {
        $req = "DELETE 
                FROM    utilisateurs
                WHERE   id = :id";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":id" => $id
        ]);
    }

    public function ModifierUtilisateur($id, $login, $email, $password, $droits)
    {

        $req = "UPDATE  utilisateurs
                SET     login       = :login,
                        email       = :email,
                        password    = :password,
                        id_droits   = :droits
                WHERE   id          = :id";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":login"    => $login,
            ":email"    => $email,
            ":password" => $password,
            ":droits"   => $droits,
            ":id"       => $id,
        ]);
    }

    public function GetLesCategories()
    {
        $req = "SELECT *
                FROM   categories";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([]);

        return $query->fetchAll();
    }

    public function GetUneCategorieParId($id)
    {
        $req = "SELECT  *
                FROM    categories
                WHERE   id = :id";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":id" => $id
        ]);
        return $query->fetch();
    }

    public function AjouterCategorie($nom)
    {
        $req = "INSERT 
                INTO    categories (nom) 
                VALUES  (:nom)";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":nom" => $nom
        ]);
    }

    public function ModifierCategorie($id, $nom)
    {
        $req = "UPDATE  categories
                SET     nom = :nom
                WHERE   id  = :id";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":nom" => $nom,
            ":id"  => $id
        ]);
    }

    public function SupprimerCategorie($id)
    {
        $req = "DELETE
                FROM    categories
                WHERE   id = :id";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":id" => $id
        ]);
    }
    /**
     * Dans cette requête, nous utilisons les jointures en SQL
     * representées par le mot clé "INNER JOIN"
     * 
     * Ces jointures nous permettent de profiter des clés étrangères
     * contenues dans la table article pour faire un lien vers les tables
     * dont sont issues ces clés étrangères
     * 
     * Une clé étrangère est une clé primaire d'un table qui se retrouve dans une
     * autre table
     * 
     * On utilise donc les liens qu'il y a entre les différentes tables afin
     * de recuperer plus facilement des données en créant un chemin entre-elles
     */
    public function GetLesArticles()
    {
        $req = "SELECT          articles.id, 
                                titre, 
                                contenu, 
                                date, 
                                utilisateurs.login AS auteur, 
                                categories.nom AS categorie

                FROM            articles
                INNER JOIN      utilisateurs
                ON              utilisateurs.id = id_utilisateur
                INNER JOIN      categories
                ON              categories.id = id_categorie
                ORDER BY        date DESC";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([]);

        return $query->fetchAll();
    }

    /**
     * Retourne tous les articles correspondant à 
     * l'id categorie passé en paramètre
     */
    public function GetLesArticlesParIdCategorie($idCategorie)
    {
        $req = "SELECT      articles.id, 
                            titre, 
                            contenu, 
                            date, 
                            utilisateurs.login AS auteur, 
                            categories.nom AS categorie
                FROM        articles
                INNER JOIN  utilisateurs
                ON          utilisateurs.id = id_utilisateur
                INNER JOIN  categories
                ON          categories.id = id_categorie
                WHERE       id_categorie = :idCategorie";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":idCategorie" => $idCategorie
        ]);
        return $query->fetchAll();
    }
    public function GetUnArticleParId($id)
    {
        $req = "SELECT      articles.id, 
                            titre, 
                            contenu, 
                            date, 
                            utilisateurs.login AS auteur, 
                            categories.nom AS categorie
                FROM        articles
                INNER JOIN  utilisateurs
                ON          utilisateurs.id = id_utilisateur
                INNER JOIN  categories
                ON          categories.id = id_categorie
                WHERE       articles.id = :id";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":id" => $id
        ]);
        return $query->fetch();
    }

    public function AjouterArticle($titre, $contenu, $utilisateur, $categorie)
    {
        $req = "INSERT 
                INTO    articles (titre, contenu, id_utilisateur, id_categorie) 
                VALUES  (:titre, :contenu, :id_utilisateur, :id_categorie)";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":titre" => $titre,
            ":contenu" => $contenu,
            ":id_utilisateur" => $utilisateur,
            ":id_categorie" => $categorie
        ]);
    }

    public function ModifierArticle($id, $titre, $contenu, $categorie)
    {

        $req = "UPDATE  articles
                SET     titre           = :titre,
                        contenu         = :contenu,
                        id_categorie    = :categorie
                WHERE   id  = :id";

        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":titre"        => $titre,
            ":contenu"      => $contenu,
            ":categorie"    => $categorie,
            ":id"           => $id
        ]);
    }

    public function SupprimerArticle($id)
    {
        $req = "DELETE
                FROM    articles
                WHERE   id = :id";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":id" => $id
        ]);
    }

    public function GetLesCommentairesParArticleId($id)
    {
        $req = "SELECT      commentaires.id,
                            commentaire,
                            id_utilisateur,
                            id_article,
                            utilisateurs.login AS auteur,
                            date
                FROM        commentaires
                INNER JOIN  utilisateurs
                ON          utilisateurs.id = id_utilisateur
                WHERE       id_article = :id";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":id" => $id
        ]);
        return $query->fetchAll();
    }

    public function AjouterCommentaire($idArticle, $idUtilisateur, $commentaire)
    {
        $req = "INSERT INTO commentaires (id_article, id_utilisateur, commentaire) 
                VALUES (:idArticle, :idUtilisateur, :commentaire)";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":idArticle" => $idArticle,
            ":idUtilisateur" => $idUtilisateur,
            ":commentaire" => $commentaire
        ]);
    }

    public function SupprimerUnCommentaire($idCommentaire)
    {
        $req = "DELETE
                FROM    commentaires
                WHERE   id = :id";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":id" => $idCommentaire
        ]);
    }

    public function SupprimerTousLesCommentairesParArticleId($idArticle)
    {
        $req = "DELETE
                FROM    commentaires
                WHERE   id_article = :idArticle";
        $query = utilisateur::$pdoBlog->prepare($req);
        $query->execute([
            ":idArticle" => $idArticle
        ]);
    }
}
