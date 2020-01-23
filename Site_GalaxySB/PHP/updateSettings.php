<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
require"isConnect.php";
require("connect.php");

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    
    error_reporting(E_ERROR | E_PARSE);
    $requeteIdUtil = $db->query("SELECT IdUtil FROM utilisateur WHERE pseudoUtil='$login'");
    $IdUtil = $requeteIdUtil->fetch();
    $IdUtil = $IdUtil[0];


    
$prenomUtil = htmlspecialchars($_POST['prenomUtil']);
$emailUtil = htmlspecialchars($_POST['emailUtil']);

    $sql =("UPDATE utilisateur SET prenomUtil=:prenomUtil, emailUtil=:emailUtil WHERE idUtil=:idUtil");
    $q = $db->prepare($sql);
    $q->execute(array(':prenomUtil'=>$prenomUtil, ':emailUtil'=>$emailUtil, ':idUtil'=>$IdUtil));
    

    header("location: ../gsbSettings.php?maj=true");
    }else{
    header("location: ../gsbSettings.php?maj=false");
    }