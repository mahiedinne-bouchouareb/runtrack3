<?php session_start();

try 
{
    $bdd = new PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
// echo'<pre>';
// var_dump($_POST);
// echo'</pre>';

$users = $bdd->query('SELECT * FROM utilisateurs');
$resultat = $users->fetchall();


if(@$_POST['repere_inscription'] == 1)
{


if ( empty($_POST['nom'])  OR  empty($_POST['prenom'])  OR empty($_POST['email']) OR empty($_POST['mdp'])  OR empty($_POST['confirm_mdp']))
    {
        echo 'tous les champs doivent être remplis';
    }

else
    {


        // ---------------------------------------------------------------verif mot de passe
        if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#',$_POST['mdp']))
            {
                if($_POST['mdp'] == $_POST['confirm_mdp'])
                    {
                        $password = password_hash($_POST['mdp'], PASSWORD_DEFAULT) ; 
                    }
                else
                    {
                        echo 'les mots de passe doivent être identiques';
                        exit;
                    }
                
            }
        else
            {
                echo 'le mot de passe doit contenir au moins 8 caractères, un chiffre, une majuscule et un caractère spécial';  
                exit; 
            }



        foreach($resultat as $key => $value )

        {

            if($_POST['email'] == $value['email'])
                {
                    echo 'email déjà utilisé';
                    exit;
                }
                
        }
            
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {

                $nom = htmlspecialchars($_POST['nom']) ;
                $prenom = htmlspecialchars($_POST['prenom']) ;
                $email = htmlspecialchars($_POST['email']) ;
                $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT) ; 

                $requete = $bdd->prepare(" INSERT INTO utilisateurs(nom,prenom,email,password) 
                                VALUES (:nom, :prenom, :email, :mdp)");

                $requete->bindParam(':nom', $nom);
                $requete->bindParam(':prenom', $prenom);
                $requete->bindParam(':email', $email);
                $requete->bindParam(':mdp', $mdp);

                $requete->execute();
                // header("Location: connexion.php");
                exit;
            }
        else
            {
                echo 'format email no valide';
                exit;
            }
            
            
            
    }

}


if(@$_POST['repere_connexion'])
{


    if(empty($_POST['email_connexion'])  OR  empty($_POST['mdp_connexion']))
        {
            echo 'veuillez remplir tous les champs';
            exit;
        }
    else
        {
            $users = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email');
            $users->execute(array( 'email' => $_POST['email_connexion']   ));
            $donnees = $users->fetch();

            if($donnees != NULL AND  password_verify($_POST['mdp_connexion'], $donnees['password'] ))
                {
                    $_SESSION['prenom'] = $donnees['prenom'];
                   echo 'connexion validee';
                   exit;
                }

            else
                {
                    echo 'erreur d\'email ou de mot de passe';
                    exit;
                }    
        }


}