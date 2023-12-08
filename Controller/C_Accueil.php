<?php
require "../Model/M_Accueil.php";
session_start();

if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
    header("location:./Login");
}
if (!isset($_SESSION["Admin"]))
    header("location:./Login");



$home = new Home();
$nbClients = $home ->F1();
$nbClientsNo = $home ->F2();
$Total =$home ->F3();
$ThisMonth =$home ->F4();
$req = $home ->F5() ;
require "../View/Accueil.php";
?>