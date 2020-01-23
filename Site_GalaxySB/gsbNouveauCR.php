<?php
session_start(); // démarrage d'une session

require("PHP/connect.php");
// on vérifie que les variables de session identifiant l'utilisateur existent
error_reporting(E_ERROR | E_PARSE);
date_default_timezone_set('Europe/Paris');
$date = date('Y-m-d');

$envoie=$_GET['envoie'];

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
        <link rel="stylesheet" href="CSS/gsbNouveauCR.css">
    </head>
    <body>
        <!-- Navigation -->
<nav id="slide-menu">
    <a href="index.php"><center><img class="logoMenu" src="src/logo.png" width="150px" height="90px"/></center></a>
	<ul>
        <p class="MenuTitre">Comptes-Rendus </p>
        <li class="timeline"><a href="gsbNouveauCR.php">Nouveaux</a></li>
        <li class="events"><a href="gsbConsulterCR.php">Consulter</a></li>
        
        <p class="MenuTitre">Medecins</p>
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
				        <h2>Le compte rendu a bien été sauvegardé</h2>
				    </div>
				</div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <div class="AllFormMedic">
        <div class="container">
            
    <form name="formNOUVEAU_CR" class="well form-horizontal" action="PHP/recupNouveauCr.php" method="POST" id="nouveauCR_form">
<fieldset>

<!-- Form Name -->
<legend>Ajouter un compte rendu</legend>

<!-- Text input-->

    <div class="form-group">
      <label class="col-md-4 control-label">Date</label>  
      <div class="input-group">
      <input type="text" size="10" name="dateCR" class="zone" value="<?php echo($date); ?>" readonly/>
      </div>
    </div>
    
    <!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Visiteur</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="visiteurCR" class="zone">
      <option selected value="<?php echo($login) ?>"><?php echo($login) ?></option>
    </select>
  </div>
</div>
    
<div class="form-group"> 
  <label class="col-md-4 control-label">Médecin</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select  name="medecinCR" class="zone">
        
        <?php  // On recupere tout le contenu de la table medecin
        $reponse = $db->query("SELECT nomMedecin, prenomMedecin FROM medecin");
        
        while ($donnees = $reponse->fetch()){ ?>
            <option value="<?php echo($donnees['nomMedecin']); echo(' '); echo($donnees['prenomMedecin']); ?>"><?php echo($donnees['nomMedecin']); echo(' '); echo($donnees['prenomMedecin']); ?></option>
        <?php } ?>
        
    </select>
  </div>
</div>

<div class="form-group"> 
  <label class="col-md-4 control-label">Motif</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select  name="motifCR" class="zone">
      <option selected value="Presentation d'un nouveau medicament">Presentation d'un nouveau medicament</option>
        <option value="Rendez-vous d'affaire">Rendez-vous d'affaire</option>
        <option value="Rendez-vous d'affaire">Autre</option>
    </select>
  </div>
</div>
    <!-- Text area -->
  
    <div class="form-group">
      <label class="col-md-4 control-label">Bilan</label>
        <div class="input-group">
            <textarea rows="8" cols="60" name="bilanCR" class="zone" placeholder="Exemple: Le médecin visité a choisi de nous recontacter ultérieurement pour nous faire part de sa décision." required maxlength="1500"></textarea>
      </div>
    </div>
    
    <!-- Text input ID CREATEUR CR-->

    <div class="form-group"> 
      <div class="input-group">
      <input type="text" size="6" name="redigePar" class="zone" hidden readonly value="<?php echo($idUtil); ?>" />
      </div>
    </div>
    

            <div class="boutonRV">
            <input type="reset" value="Retour">
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

