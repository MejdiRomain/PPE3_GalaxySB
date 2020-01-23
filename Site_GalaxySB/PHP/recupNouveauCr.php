<?php
session_start();
// configuration
require"isConnect.php";
require_once("connect.php");
$dateCR = htmlspecialchars($_POST['dateCR']);
$visiteurCR = htmlspecialchars($_POST['visiteurCR']);
$medecinCR = htmlspecialchars($_POST['medecinCR']);
$motifCR = htmlspecialchars($_POST['motifCR']);
$bilanCR = htmlspecialchars($_POST['bilanCR']);
$redigePar = htmlspecialchars($_POST['redigePar']);



    if(isset($_SESSION['login'])){
        $sql =("INSERT INTO compterendu (dateCR,visiteurCR,medecinCR,motifCR,bilanCR,redigePar) VALUES (:dateCR , :visiteurCR , :medecinCR , :motifCR , :bilanCR , :redigePar)");
        
        $q = $db->prepare($sql);
        $q->execute(array(':dateCR'=>$dateCR,':visiteurCR'=>$visiteurCR,':medecinCR'=>$medecinCR,':motifCR'=>$motifCR,':bilanCR'=>$bilanCR,':redigePar'=>$redigePar));
        
        header("location: ../gsbNouveauCR.php?envoie=true");
    }else{
        header("location: ../gsbNouveauCR.php?erreur=true");
    }