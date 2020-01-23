<?php
session_start(); // démarrage d'une session

require("./connect.php");
// on vérifie que les variables de session identifiant l'utilisateur existent

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    $motCle = $_GET['motCle'];
    
?>
        
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../CSS/global.css">
        <link rel="stylesheet" href="../CSS/rechercherCR.css">
    </head>
    <body>
<!-- Content panel -->
<div id="content">
    
    <input class="myButton" type="button" value="Retour" onclick="history.back()">
    
    
    <style> 
        
        
    </style>

    <?php
    try
    { 
        // On recupere tout le contenu de la table Compte rendu
        $reponse = $db->query("SELECT idCR,dateCR, motifCR, medecinCR, visiteurCR, bilanCR FROM compterendu WHERE bilanCR LIKE '%$motCle%' OR dateCR LIKE '%$motCle%' OR motifCR LIKE '%$motCle%' OR medecinCR LIKE '%$motCle%' OR visiteurCR LIKE '%$motCle%'");
        // On affiche le resultat
    while ($donnees = $reponse->fetch())
    {
    ?>
    <table>
        <tr>
            <TD class=".p5" rowspan="4"><?php echo "$donnees[idCR]"; ?></TD>
            <TD class=".p5">Date:</TD>
            <TD class=".p36"><?php echo "$donnees[dateCR]"; ?></TD>
            <td class=".p64" rowspan="4"><?php echo "$donnees[bilanCR]"; ?></td>
            <td class=".p64" rowspan="4" >
                <form action="modifCR.php" method="get">
                    <input name="idCR" type="text" value="<?php echo "$donnees[idCR]"; ?>" hidden readonly />
                    <button class="myButton">Modifier</button>
                </form>
            </td>
            
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
    <?php
    }
    $reponse->closeCursor();
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
?>

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

