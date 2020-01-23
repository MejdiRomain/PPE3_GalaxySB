<?php
session_start(); // démarrage d'une session

require("connect.php");
// on vérifie que les variables de session identifiant l'utilisateur existent

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $idCR = $_GET['idCR'];
    
    $requeteIdUtil = $db->query("SELECT idUtil FROM utilisateur WHERE pseudoUtil='$login'");
    $idUtil = $requeteIdUtil->fetch();
    $idUtil = $idUtil[0];
    
    date_default_timezone_set('Europe/Paris');
    $date = date('Y-m-d');
    
?>
        
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../CSS/global.css">
        <link rel="stylesheet" href="../CSS/modifCR.css">
    </head>
    <body>

    <?php
        // On recupere tout le contenu de la table Comppte rendu
        $reponse = $db->query("SELECT idCR,dateCR, motifCR, medecinCR, visiteurCR, bilanCR FROM compterendu WHERE idCR='$idCR'");
        // On affiche le resultat
        ($donnees = $reponse->fetch())
    ?>
    <div id="content">
            <table>
                <tr>
                    <TD class=".p5" rowspan="4"><?php echo "$donnees[idCR]"; ?></TD>
                    <TD class=".p5">Date:</TD>
                    <TD class=".p36"><?php echo "$donnees[dateCR]"; ?></TD>
                    <td class=".p64" rowspan="4"><?php echo "$donnees[bilanCR]"; ?></td>
                </tr>
                <tr>
                    <td class=".p5">Motif:</td>
                    <td class=".p36" ><?php echo "$donnees[motifCR]"; ?></td>
                </tr>
                <tr>
                    <td class=".p5">Médecin Visité:</td>
                    <td class=".p36" ><?php echo "$donnees[medecinCR]"; ?></td>
                </tr>
                <tr>
                    <td class=".p5">Visiteur:</td>
                    <td class=".p36" ><?php echo "$donnees[visiteurCR]"; ?></td>
                </tr>
            </table>
        
    <input class="myButton" type="button" value="Retour" onclick="history.back()">
        
    <div class="AllFormMedic">
        <div class="container">
            
    <form name="formMODIFIER_CR" class="well form-horizontal" action="modifCR_Final.php" method="POST" id="ModifierCR_form">
        <fieldset>

        <!-- Form Name -->
        <legend>Modifier un compte rendu</legend>

        <!-- Text input-->

            <div class="form-group">
              <label class="col-md-4 control-label">Nouvelle date</label>  
              <div class="input-group">
              <input type="text" size="6" name="dateCR_Modif" class="zone" value="<?php echo($date); ?>" readonly/>
              </div>
            </div>
            
            <div class="form-group"> 
  <label class="col-md-4 control-label">Motif</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select  name="motifCR" class="zone">
      <option selected value="Presentation d'un nouveau medicament">Presentation d'un nouveau medicament</option>
        <option value="Rendez-vous d'affaire">Rendez-vous d'affaire</option>
    </select>
  </div>
</div>
            
            <div class="form-group"> 
  <label class="col-md-4 control-label">Médecin</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select  name="medecinCR" class="zone">
      <option selected value="Elizabeth Bertin">Elizabeth Bertin</option>
        <option value="Maslin Majory">Maslin Majory</option>
    </select>
  </div>
</div>
            
<div class="form-group"> 
  <label class="col-md-4 control-label">Visiteur</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="visiteurCR" class="zone">
      <option selected value="Alysson Blanc">Alysson Blanc</option>
      <option value="Aleron Huot">Aleron Huot</option>
    </select>
  </div>
</div>
            
    <div class="form-group">
      <label class="col-md-4 control-label">Bilan</label>
        <div class="input-group">
            <textarea rows="8" cols="60" name="bilanCR" class="zone" placeholder="Exemple: Le médecin visité a choisi de nous recontacter ultérieurement pour nous faire part de sa décision." required maxlength="1500"></textarea>
      </div>
    </div>
            
            <input type="text" size="6" name="idCR" class="zone" value="<?php echo($idCR); ?>" readonly hidden />
            
            <input type="text" size="6" name="modifiePar" class="zone" value="<?php echo($idUtil); ?>" readonly hidden />
            
            <div class="boutonRV">
            <input type="reset" value="Retour">
            <input type="submit" value="Modifier">
        
        </div>
            
        </fieldset>
    </form>
    
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
    header("location:../login.php");
}

