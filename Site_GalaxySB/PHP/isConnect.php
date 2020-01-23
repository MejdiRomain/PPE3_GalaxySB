<?php
// on vérifie que les variables de session identifiant l'utilisateur existent
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
}else{
    header("location: login.php");
}
?>