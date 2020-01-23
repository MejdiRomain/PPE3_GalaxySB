<?php
session_start();
// configuration
require"isConnect.php";
require_once("connect.php");
$nomMedecin = htmlspecialchars($_POST['nomMedecin']);
$prenomMedecin = htmlspecialchars($_POST['prenomMedecin']);
$specMedecin = htmlspecialchars($_POST['specMedecin']);
$adresseMedecin = htmlspecialchars($_POST['adresseMedecin']);
$villeMedecin = htmlspecialchars($_POST['villeMedecin']);
$cpMedecin = htmlspecialchars($_POST['cpMedecin']);
$telMedecin = htmlspecialchars($_POST['telMedecin']);
$depMedecin = htmlspecialchars($_POST['depMedecin']);
$ajouterPar = htmlspecialchars($_POST['ajouterPar']);

    if(isset($_SESSION['login'])){
        $reponse = $db->query("SELECT nomMedecin, prenomMedecin FROM medecin WHERE nomMedecin = '$nomMedecin' AND prenomMedecin = '$prenomMedecin'");
        
        $donnees = $reponse->fetch();
        
            $testNomPrenomDB = $donnees['nomMedecin'].' '.$donnees['prenomMedecin'];
            $testNomPrenom = $nomMedecin.' '.$prenomMedecin;
            if($testNomPrenomDB == $testNomPrenom){
                header("location: ../gsbNouveauMedecin.php?erreur=true");
            }
        var_dump($reponse); var_dump($testNomPrenom); die();
        $sql =("INSERT INTO medecin (nomMedecin, prenomMedecin, specMedecin, adresseMedecin, villeMedecin, cpMedecin, telMedecin, depMedecin, ajouterPar) VALUES (:nomMedecin, :prenomMedecin, :specMedecin, :adresseMedecin, :villeMedecin, :cpMedecin, :telMedecin, :depMedecin, :ajouterPar)");
        
        $q = $db->prepare($sql);
        $q->execute(array(':nomMedecin'=>$nomMedecin,':prenomMedecin'=>$prenomMedecin,':specMedecin'=>$specMedecin,':adresseMedecin'=>$adresseMedecin,':villeMedecin'=>$villeMedecin,':cpMedecin'=>$cpMedecin,':telMedecin'=>$telMedecin,':depMedecin'=>$depMedecin,':ajouterPar'=>$ajouterPar));
        
        header("location: ../gsbNouveauMedecin.php?envoie=true");
        }