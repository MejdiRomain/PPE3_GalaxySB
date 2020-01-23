<?php
session_start(); // démarrage d'une session

require 'connect.php';
// on vérifie que les données du formulaire sont présentes
if (isset($_POST['login']) && isset($_POST['mdp'])) {
    require 'fonctions.php';
    $bdd = getBdd();
    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['mdp']);
    /*$mdp = sha1($mdp);*/
    // cette requête permet de récupérer l'utilisateur depuis la BD
    $requete = "SELECT * FROM utilisateur WHERE pseudoUtil='$login' AND passUtil='$mdp'";
    $resultat = $bdd->prepare($requete);
    $resultat->execute(array($login, $mdp));
    
    if ($resultat->rowCount() > 0) {
        // l'utilisateur existe dans la table
        // on ajoute ses infos en tant que variables de session
        $_SESSION['login'] = $login;
        $_SESSION['mdp'] = $mdp;
        // cette variable indique que l'authentification a reussi
        $authOK = true;

        
        $requeteGrade = $db->query("SELECT gradeUtil FROM utilisateur WHERE pseudoUtil='$login'");
        $grade = $requeteGrade->fetch();
        $grade = $grade[0];
        
        $_SESSION['gradeUtil'] = $grade;
    }
}  

        if (isset($authOK)) {
            header("location: ../index.php?con=true");
        }
        else { 
            header("location: ../login.php?error=mdploginfalse");
        }