<?php
session_start(); // démarrage d'une session

require("PHP/connect.php");
// on vérifie que les variables de session identifiant l'utilisateur existent
error_reporting(E_ERROR | E_PARSE);
$envoie=$_GET['envoie'];
$erreur=$_GET['erreur'];

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    
    $requeteIdUtil = $db->query("SELECT idUtil FROM utilisateur WHERE pseudoUtil='$login'");
    $idUtil = $requeteIdUtil->fetch();
    $idUtil = $idUtil[0];
?>
        
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="CSS/global.css">
        <link rel="stylesheet" href="CSS/gsbNouveauMedecin.css">
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
    
    <?php if($envoie==true){ ?>
        <div class="overlay-wrap">
		<input type="checkbox" name="hide" id="hide">
		<label class="hide" for="hide">X</label>
		<div class="overlay2">
            <div class="overlay">
				<div class="overlay-inner">
				    <div class="message">
				        <h2>Le médecin a bien été ajouté</h2>
				    </div>
				</div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <?php if($erreur==true){ ?>
        <div class="overlay-wrap">
		<input type="checkbox" name="hide" id="hide">
		<label class="hide" for="hide">X</label>
		<div class="overlay2">
            <div class="overlay">
				<div class="overlay-inner">
				    <div class="message">
				        <h2>Erreur : Le médecin existe déjà</h2>
				    </div>
				</div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <div class="AllFormMedic">
        <div class="container">
            
    <form name="formNOUVEAU_MEDECIN" class="wellform-horizontal" action="PHP/recupNouveauMedecin.php" method="POST" id="nouveauMedecin_form">
<fieldset>

<!-- Form Name -->
<legend>Ajouter un médecin</legend>

<!-- Text input-->

    <div class="form-group">
      <label class="col-md-4 control-label">Nom</label>  
      <div class="input-group">
      <input type="text" size="10" name="nomMedecin" class="zone" required/>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-md-4 control-label">Prénom</label>  
      <div class="input-group">
      <input type="text" size="10" name="prenomMedecin" class="zone" required/>
      </div>
    </div>
    
    <!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Spécialité</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="specMedecin" class="zone">
      <option selected value="Generaliste">Généraliste</option>
      <option value="Podologue">Podologue</option>
    </select>
  </div>
</div>
    
<!-- Text input-->

    <div class="form-group">
      <label class="col-md-4 control-label">Adresse</label>  
      <div class="input-group">
      <input type="text" size="15" name="adresseMedecin" class="zone" required/>
      </div>
    </div>
    
     <div class="form-group">
      <label class="col-md-4 control-label">Ville</label>  
      <div class="input-group">
      <input type="text" size="15" name="villeMedecin" class="zone" required/>
      </div>
    </div>
    
     <div class="form-group">
      <label class="col-md-4 control-label">Code Postal</label>  
      <div class="input-group">
      <input type="text" size="10" name="cpMedecin" class="zone" required/>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-md-4 control-label">Téléphone</label>  
      <div class="input-group">
      <input type="text" size="10" name="telMedecin" class="zone" required/>
      </div>
    </div>
    
    <div class="form-group">
      <label class="col-md-4 control-label">Département</label>  
      <div class="input-group">
      <input type="text" size="10" name="depMedecin" class="zone" required/>
      </div>
    </div>
    
    <!-- Text input ID Ajout Medecin-->

    <div class="form-group"> 
      <div class="input-group">
      <input type="text" size="6" name="ajouterPar" class="zone" hidden readonly value="<?php echo($idUtil); ?>" />
      </div>
    </div>
    

            <div class="boutonRV">
            <input type="submit" value="Enregistrer">
        </div>
    </div>
</fieldset>
</form>
</div>
    </div><!-- /.container -->
    
</div>

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

