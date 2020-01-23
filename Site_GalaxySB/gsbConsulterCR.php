<?php
session_start(); // démarrage d'une session

require("PHP/connect.php");
// on vérifie que les variables de session identifiant l'utilisateur existent

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    
    error_reporting(E_ERROR | E_PARSE);
    $envoie=$_GET['envoie'];
    $erreur=$_GET['erreur'];
    
?>
        
<html>
    <head>
        <title>Login GalaxySB</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="CSS/global.css">
        <link rel="stylesheet" href="CSS/gsbConsulterCR.css">
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
    
    <form action="PHP/rechercherCR.php" method="GET">
                    <center><input name="motCle" type="text" placeholder="Veuillez saisir un mot-clé" />
                    <button class="myButton">Rechercher</button></center>
                </form>
    
    <?php if($envoie==true){ ?>
        <div class="overlay-wrap">
		<input type="checkbox" name="hide" id="hide">
		<label class="hide" for="hide">X</label>
		<div class="overlay2">
            <div class="overlay">
				<div class="overlay-inner">
				    <div class="message">
				        <h2>Le compte rendu a bien été modifié</h2>
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
				        <h2>Erreur le compte rendu n'a pas été modifié</h2>
				    </div>
				</div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <?php 
    try
    { 
        // Pagination
        $perPage = 3;
        
        $req = $db->query('SELECT COUNT(idCR) AS total from compterendu');
        $result = $req->fetch();
        $total = $result['total'];
        
        $nbPage= ceil($total/$perPage);
        
        if(isset($_GET['p']) && !empty($_GET['p']) && ctype_digit($_GET['p']) == 1){
            if($_GET['p'] > $nbPage){
                $current = $nbPage;
            }else{
                $current = $_GET['p'];
            }
        }else{
            $current = 1;
        }
        
        $firstOfPage = ($current-1)*$perPage;
        // On recupere tout le contenu de la table medecin
        $reponse = $db->query("SELECT idCR,dateCR, motifCR, medecinCR, visiteurCR, bilanCR FROM compterendu ORDER BY idCR ASC LIMIT $firstOfPage,$perPage");
        
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
                <form action="PHP/modifCR.php" method="get">
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
    <!--Pagination-->
     <?php 
    for($i=1 ; $i<=$nbPage ; $i++){   
        
        if($i == $current){
            ?>
                <div class="buttonPage">
                <button class="active"><a class="pagination" href="?p=<?php echo $i ?>"><?php echo $i ?></a></button>
                </div>
            <?php
        }else{
            ?>
                <div class="buttonPage">
                <button><a class="pagination" href="?p=<?php echo $i ?>"><?php echo $i ?></a></button>
                </div>
                
            <?php
        }
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

