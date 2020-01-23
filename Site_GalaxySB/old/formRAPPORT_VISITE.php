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
        
<script language="javascript">
		function selectionne(pValeur, pSelection,  pObjet) {
			//active l'objet pObjet du formulaire si la valeur sélectionnée (pSelection) est égale à la valeur attendue (pValeur)
			if (pSelection==pValeur) 
				{ formRAPPORT_VISITE.elements[pObjet].disabled=false; }
			else { formRAPPORT_VISITE.elements[pObjet].disabled=true; }
		}
	</script>
	 <script language="javascript">
        function ajoutLigne( pNumero){//ajoute une ligne de produits/qté à la div "lignes"     
			//masque le bouton en cours
			document.getElementById("but"+pNumero).setAttribute("hidden","true");	
			pNumero++;										//incrémente le numéro de ligne
            var laDiv=document.getElementById("lignes");	//récupère l'objet DOM qui contient les données
			var titre = document.createElement("label") ;	//crée un label
			laDiv.appendChild(titre) ;						//l'ajoute à la DIV
			titre.setAttribute("class","titre") ;			//définit les propriétés
			titre.innerHTML= "   Produit : ";
			var liste = document.createElement("select");	//ajoute une liste pour proposer les produits
			laDiv.appendChild(liste) ;
			liste.setAttribute("name","PRA_ECH"+pNumero) ;
			liste.setAttribute("class","zone");
			//remplit la liste avec les valeurs de la première liste construite en PHP à partir de la base
			liste.innerHTML=formRAPPORT_VISITE.elements["PRA_ECH1"].innerHTML;
			var qte = document.createElement("input");
			laDiv.appendChild(qte);
			qte.setAttribute("name","PRA_QTE"+pNumero);
			qte.setAttribute("size","2"); 
			qte.setAttribute("class","zone");
			qte.setAttribute("type","text");
			var bouton = document.createElement("input");
			laDiv.appendChild(bouton);
			//ajoute une gestion évenementielle en faisant évoluer le numéro de la ligne
			bouton.setAttribute("onClick","ajoutLigne("+ pNumero +");");
			bouton.setAttribute("type","button");
			bouton.setAttribute("value","+");
			bouton.setAttribute("class","zone");	
			bouton.setAttribute("id","but"+ pNumero);				
        }
    </script>
        
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

