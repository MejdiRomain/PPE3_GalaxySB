<!DOCTYPE html>
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="global.css">
    </head>
    <body>
        <!-- Navigation -->
<nav id="slide-menu">
    <a href="index.php"><center><img class="logoMenu" src="src/logo.png" width="150px" height="90px"/></center></a>
	<ul>
        <p class="MenuTitre">Comptes-Rendus </p>
        <li class="timeline"><a href="formRAPPORT_VISITE.php">Nouveaux</a></li>
        <li class="events"><a href="menuCR.php">Consulter</a></li>
        
        <p class="MenuTitre">Consulter</p>
        <li class="timeline"><a href="formMEDICAMENT.php">Médicament</a></li>
        <li class="events"><a href="formPRATICIEN.php">Praticiens</a></li>
        <li class="calendar"><a href="formVISITEUR.php">Autres visiteurs</a></li>
        <li class="sep settings"><a href="formSETTINGS.php">Paramètres</a></li>
        <li class="logout"><a href="PHP/disconnect.php">Déconnexion</a></li>
        <li class="textMenu">Copyright © 2019 GalaxySB</li>
	</ul>
    
    
</nav>
<!-- Content panel -->
<div id="content">
	<div class="menu-trigger"></div>

    
    
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

