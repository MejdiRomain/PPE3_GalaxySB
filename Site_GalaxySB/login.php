<?php
session_start(); // démarrage d'une session   
require("PHP/connect.php");

error_reporting(E_ERROR | E_PARSE);
$error=$_GET['error'];

// on vérifie que les variables de session identifiant l'utilisateur existent
if (isset($_SESSION['login'])) {
    
    header("location: index.php");

}else{ ?>
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="CSS/global.css">
        <link rel="stylesheet" href="CSS/login.css">
    </head>
        <body>
            <div class="login-page">
              <div class="form">
                <img src="src/logo.png" width="200px" height="150px">
                  <?php if($error=="mdploginfalse"){
                            echo("<h5 class='msgErreur'>Erreur d'authentification</h5>");
                        } ?>
                <form class="login-form" action="PHP/login_post.php" method="post">
                  <input name="login" type="text" placeholder="Nom d'utilisateur"/>
                  <input name="mdp" type="password" placeholder="Mot de passe"/>
                  <button>Connexion</button>
                </form>
              </div>
            </div>
            <script>
                $('.message a').click(function(){
                   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
                });
            </script>
        </body>
</html>
<?php } ?>