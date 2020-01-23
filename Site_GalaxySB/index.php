<?php
session_start(); // démarrage d'une session

require("PHP/connect.php");
// on vérifie que les variables de session identifiant l'utilisateur existent

error_reporting(E_ERROR | E_PARSE);
$con=$_GET['con'];

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
?>
        
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="CSS/global.css">
        <link rel="stylesheet" href="CSS/index.css">
    </head>
    <body>
        <!-- Navigation -->
<nav id="slide-menu">
    <a href="index.php"><center><img class="logoMenu" src="src/logo.png" width="150px" height="90px"/></center></a>
	<ul>
        <p class="MenuTitre">Comptes-Rendus </p>
        <li class="timeline"><a href="gsbNouveauCR.php">Nouveaux</a></li>
        <li class="events"><a href="gsbConsulterCR.php">Consulter</a></li>
        
        <p class="MenuTitre">Médecins</p>
        <li class="events"><a href="gsbNouveauMedecin.php">Ajout</a></li>
        <li class="calendar"><a href="gsbConsulterMedecin.php">Consulter</a></li>
        
        <li class="sep settings"><a href="gsbSettings.php">Paramètres</a></li>
        <li class="logout"><a href="PHP/disconnect.php">Déconnexion</a></li>
        <li class="textMenu">Copyright © 2019 GalaxySB</li>
	</ul>
    
    
</nav>
<!-- Content panel -->
<div id="content">
	<div class="menu-trigger"></div>

    
    <?php if($con==true){ ?>
        <div class="overlay-wrap">
		<input type="checkbox" name="hide" id="hide">
		<label class="hide" for="hide">X</label>
		<div class="overlay2">
            <div class="overlay">
				<div class="overlay-inner">
				    <div class="message">
				        <h2>Bienvenue <?php echo("<h1>$login</h1>"); ?> </h2>
				    </div>
				</div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    
    <div class="AllIndexPage">
        <div class="container">
            
        <div class="timeNow"><h1 id="tx"></h1>
            <p id="title"></p>
            <h2 style="margin-top: 10%;">Bienvenue <?php echo("<h2>$login</h2>"); ?> </h2>
        </div>
        </div>
    </div>
      
</div>
        <script>
            title.innerHTML="";
            // For time 

            function time() {
                var d = new Date();
                document.getElementById("tx").innerHTML = d.toLocaleTimeString();
            }
            setInterval(time, 1000);
        </script>
<script>
        /*
      Slidemenu
    */
    (function() {
        var $body = document.body
        , $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

        if ( typeof $menu_trigger !== 'undefined' ) {
            $menu_trigger.addEventListener('click', function() {
                $body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
            });
	   }

    }).call(this);
</script>
</body>
</html>


<?php }else{
    header("location:login.php");
}

