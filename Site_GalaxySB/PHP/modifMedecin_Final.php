<?php
session_start();
// configuration
require"isConnect.php";
require_once("connect.php");
$idMedecin = htmlspecialchars($_POST['idMedecin']);
$nomMedecin = htmlspecialchars($_POST['nomMedecin']);
$prenomMedecin = htmlspecialchars($_POST['prenomMedecin']);
$adresseMedecin = htmlspecialchars($_POST['adresseMedecin']);
$villeMedecin = htmlspecialchars($_POST['villeMedecin']);
$cpMedecin = htmlspecialchars($_POST['cpMedecin']);
$telMedecin = htmlspecialchars($_POST['telMedecin']);



    if(isset($_SESSION['login'])){
        $login=$_SESSION['login'];
        
        $sql =("UPDATE medecin SET nomMedecin=:nomMedecin, prenomMedecin=:prenomMedecin, adresseMedecin=:adresseMedecin, villeMedecin=:villeMedecin, cpMedecin=:cpMedecin, telMedecin=:telMedecin WHERE idMedecin=:idMedecin");
        $q = $db->prepare($sql);
        $q->execute(array(':nomMedecin'=>$nomMedecin, ':prenomMedecin'=>$prenomMedecin, ':adresseMedecin'=>$adresseMedecin, ':villeMedecin'=>$villeMedecin, ':cpMedecin'=>$cpMedecin, ':telMedecin'=>$telMedecin, ':idMedecin'=>$idMedecin));
        
        header("location: ../gsbConsulterMedecin.php?envoie=true");
    }else{
        header("location: ../gsbConsulterMedecin.php?erreur=true");
    }