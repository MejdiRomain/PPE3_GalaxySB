<?php
session_start(); // démarrage d'une session

require("connect.php");
// on vérifie que les variables de session identifiant l'utilisateur existent

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $idMedecin = $_GET['idMedecin'];
    
    $requeteIdUtil = $db->query("SELECT idUtil FROM utilisateur WHERE pseudoUtil='$login'");
    $idUtil = $requeteIdUtil->fetch();
    $idUtil = $idUtil[0];
    
?>
        
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../CSS/global.css">
        <link rel="stylesheet" href="../CSS/modifMedecin.css">
    </head>
    <body>

    <?php
        // On recupere tout le contenu de la table Medecin
        $reponse = $db->query("SELECT idMedecin, prenomMedecin, nomMedecin, adresseMedecin, villeMedecin, cpMedecin, telMedecin FROM medecin WHERE idMedecin='$idMedecin'");
        // On affiche le resultat
        ($donnees = $reponse->fetch())
    ?>
    <div id="content">
            <table>
        <tr>
            
            <TD class=".p5" rowspan="5"><img alt='Photo du medecin' class='sidebar__avatar' src='https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_960_720.png' height="100px;"></TD>
            <TD class=".p5"><?php echo "$donnees[prenomMedecin] "; echo "$donnees[nomMedecin]"; ?></TD>
            
        </tr>
        <tr>
            <td class=".p5"><?php echo "$donnees[adresseMedecin]"; ?></td>
        </tr>
        <tr>
            <td class=".p5"><?php echo "$donnees[villeMedecin]"; ?></td>
        </tr>
        <tr>
            <td class=".p5"><?php echo "$donnees[cpMedecin]"; ?></td>
        </tr>
        <tr>
            <td class=".p5"><?php echo "$donnees[telMedecin]"; ?></td>
        </tr>
    </table>
        
    <input class="myButton" type="button" value="Retour" onclick="history.back()">
        
    <div class="AllFormMedic">
        <div class="container">
            
    <form name="formMODIFIER_MEDECIN" class="well form-horizontal" action="modifMedecin_Final.php" method="POST" id="ModifierMedecin_form">
        <fieldset>

        <!-- Form Name -->
        <legend>Modifier un médecin</legend>

        <!-- Text input-->

            <div class="form-group">
              <label class="col-md-4 control-label">Nom</label>  
              <div class="input-group">
              <input type="text" size="10" name="nomMedecin" class="zone" value="<?php echo "$donnees[nomMedecin]"; ?>"/>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label">Prénom</label>  
              <div class="input-group">
              <input type="text" size="10" name="prenomMedecin" class="zone" value="<?php echo "$donnees[prenomMedecin]"; ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label">Adresse</label>  
              <div class="input-group">
              <input type="text" size="25" name="adresseMedecin" class="zone" value="<?php echo "$donnees[adresseMedecin]"; ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label">Ville</label>  
              <div class="input-group">
              <input type="text" size="10" name="villeMedecin" class="zone" value="<?php echo "$donnees[villeMedecin]"; ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label">cp</label>  
              <div class="input-group">
              <input type="text" size="5" name="cpMedecin" class="zone" value="<?php echo "$donnees[cpMedecin]"; ?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label">Téléphone</label>  
              <div class="input-group">
              <input type="text" size="10" name="telMedecin" class="zone" value="<?php echo "$donnees[telMedecin]"; ?>" />
              </div>
            </div>
            
            
            
            <input type="text" size="6" name="idMedecin" class="zone" value="<?php echo "$donnees[idMedecin]"; ?>" readonly hidden />
            
            
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

