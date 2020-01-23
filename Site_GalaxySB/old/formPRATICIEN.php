<!DOCTYPE html>
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="global.css">
    </head>
    
    <script language = "javascript">
		function chercher($pNumero) {  
			var xhr_object = null; 	    
			if(window.XMLHttpRequest) // Firefox 
				xhr_object = new XMLHttpRequest(); 
			else if(window.ActiveXObject) // Internet Explorer 
					xhr_object = new ActiveXObject("Microsoft.XMLHTTP"); 
				else { // XMLHttpRequest non supporté par le navigateur 
					alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
					return; 
				}   
			//traitement à la réception des données
		   xhr_object.onreadystatechange = function() { 
			if(xhr_object.readyState == 4 && xhr_object.status == 200) { 
				 var formulaire = document.getElementById("formPraticien");
				formulaire.innerHTML=xhr_object.responseText;			} 
		   }
		   //communication vers le serveur
		   xhr_object.open("POST", "cherchePraticien.php", true); 
		   xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
		   var data = "pratNum=" + $pNumero ;
		   xhr_object.send(data); 
		   
	   }
	</script>
    
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
    
    <div class="AllFormMedic1">
        <div class="container">
            <fieldset>
                <legend>Praticiens</legend>
                    <form name="formListeRecherche" >
                        <select name="lstPrat" class="titre" onClick="chercher(this.value);">
                            <option>Choisissez un praticien</option>
                            <option value="Notini">Notini</option>
                            <option value="Gosselin">Gosselin</option>
                            <option value="Delahaye">Delahaye</option>
                        </select>
                        <input type="submit" value="Rechercher">
                    </form>
            </fieldset>
        </div>
                
            <form id="formPraticien">

                
                
            </form>
                
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

