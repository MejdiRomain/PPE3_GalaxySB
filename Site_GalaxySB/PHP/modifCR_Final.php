<?php
session_start();
// configuration
require"isConnect.php";
require_once("connect.php");
$idCR = htmlspecialchars($_POST['idCR']);
$dateCR_Modif = htmlspecialchars($_POST['dateCR_Modif']);
$motifCR = htmlspecialchars($_POST['motifCR']);
$medecinCR = htmlspecialchars($_POST['medecinCR']);
$visiteurCR = htmlspecialchars($_POST['visiteurCR']);
$bilanCR = htmlspecialchars($_POST['bilanCR']);
$modifiePar = htmlspecialchars($_POST['modifierPar']);
$idUtil = htmlspecialchars($_POST['idUtil']);



    if(isset($_SESSION['login'])){
        $login=$_SESSION['login'];
        
        $sql =("UPDATE compterendu SET dateCR=:dateCR_Modif, motifCR=:motifCR, medecinCR=:medecinCR, visiteurCR=:visiteurCR, bilanCR=:bilanCR, modifierPar=:modifierPar WHERE idCR=:idCR");
        $q = $db->prepare($sql);
        $q->execute(array(':dateCR_Modif'=>$dateCR_Modif, ':motifCR'=>$motifCR, ':medecinCR'=>$medecinCR, ':visiteurCR'=>$visiteurCR, ':bilanCR'=>$bilanCR, ':modifierPar'=>$modifierPar, ':idCR'=>$idCR));
        
        header("location: ../gsbConsulterCR.php?envoie=true");
    }else{
        header("location: ../gsbConsulterCR.php?erreur=true");
    }