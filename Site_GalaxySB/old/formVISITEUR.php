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
    <a href="index.php"><img class="logoMenu" src="src/logo.png" width="150px" height="90px"/></a>
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

    <div class="AllFormMedic">
        <div class="container">
            <fieldset>
                <legend>Visiteurs</legend>
                    <form name="formVISITEUR" method="post" action="recupVISITEUR.php">
                        <select name="lstDept" class="titre"><option value="">Département</option><option value="01">Ain</option></select>
                        <select name="lstVisiteur" class="zone"><option value="a131">Villechalane</option></select>
                        
                        <!-- Text input-->

    <div class="form-group">
      <label class="col-md-4 control-label">Nom</label>  
      <div class="input-group">
      <input type="text" size="25" name="VIS_NOM" class="zone" />
      </div>
    </div>
                        
    <div class="form-group">
      <label class="col-md-4 control-label">Prenom</label>  
      <div class="input-group">
      <input type="text" size="25" name="VIS_NOM" class="zone" />
      </div>
    </div>    
    
    <div class="form-group">
      <label class="col-md-4 control-label">Adresse</label>  
      <div class="input-group">
      <input type="text" size="50" name="VIS_ADRESSE" class="zone" />
      </div>
    </div> 
                        
    <div class="form-group">
      <label class="col-md-4 control-label">Code postal</label>  
      <div class="input-group">
      <input type="text" size="5" name="VIS_CP" class="zone" />
      </div>
    </div>
                        
    <div class="form-group">
      <label class="col-md-4 control-label">Ville</label>  
      <div class="input-group">
      <input type="text" size="30" name="VIS_VILLE" class="zone" />
      </div>
    </div>
                        
    <div class="form-group">
      <label class="col-md-4 control-label">Secteur</label>  
      <div class="input-group">
      <input type="text" size="1" name="SEC_CODE" class="zone" />
      </div>
    </div>
                        
    <label class="titre">&nbsp;</label><input class="zone"type="button" value="<"></input><input class="zone"type="button" value=">"></input>
    
                        
                        
                    </form>
            </fieldset>
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

