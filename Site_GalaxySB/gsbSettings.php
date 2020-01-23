<?php
session_start(); // démarrage d'une session
$errmsg_arr = array();
$errflag = false;
require("PHP/connect.php");
// on vérifie que les variables de session identifiant l'utilisateur existent
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    
    error_reporting(E_ERROR | E_PARSE);
    $requetePseudo = $db->query("SELECT pseudoUtil FROM utilisateur WHERE pseudoUtil='$login'");
    $pseudo = $requetePseudo->fetch();
    $pseudo = $pseudo[0];
    
    $requetePrenom = $db->query("SELECT prenomUtil FROM utilisateur WHERE pseudoUtil='$login'");
    $prenom = $requetePrenom->fetch();
    $prenom = $prenom[0];
    
    $requeteEmail = $db->query("SELECT emailUtil FROM utilisateur WHERE pseudoUtil='$login'");
    $email = $requeteEmail->fetch();
    $email = $email[0];
    
    $maj = $_GET['maj'];
}

if (isset($_SESSION['login'])) {
?>
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="CSS/global.css">
        <link rel="stylesheet" href="CSS/gsbSettings.css">
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
        
    <?php if($maj==true){ ?>
        <div class="overlay-wrap">
		<input type="checkbox" name="hide" id="hide">
		<label class="hide" for="hide">X</label>
		<div class="overlay2">
            <div class="overlay">
				<div class="overlay-inner">
				    <div class="message">
				        <h2>Les paramètres ont bien été mis à jour</h2>
				    </div>
				</div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <header>
  <h1>Paramètres</h1>
</header>
<div class='container'>
  <div class='sidebar'>
    <div class='sidebar__header'>
      <img alt='' class='sidebar__avatar' src='https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png' height="30px;">
      <p><?php echo($pseudo); ?></p>
    </div>

  </div>
  <div class='main'>
    <div class='main__header'>
      <h2>Vos paramètres</h2>
    </div>
    <div class='main__content'>
      <div class='main__avatar'>
        <div class='main__avatar--overlay'>
          <?php echo($pseudo); ?>
        </div>
      </div>
      <div class='main__settings-form'>
        <form action='PHP/updateSettings.php' method='post'>
          <label class='main__input-label'>Prénom:</label>
          <input class='main__input' placeholder='Votre prénom' name="prenomUtil" type='text' value="<?php echo($prenom); ?>">
          <label class='main__input-label'>Email:</label>
          <input class='main__input' placeholder='Votre adresse email' name="emailUtil" type='text' value="<?php echo ($email);?>">
            
        <button class='btn main__save-button' type="submit">Enregistrer</button>
        <button class='btn main__cancel-button' type="reset">Retour</button>
        </form>
      </div>
    </div>
  </div>
</div>
    
</div>
    
    <script>/*
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