<?php
session_start();
if (!isset($_SESSION["Admin"]))
header("location:./Controller/Login");
else
header("location:./Controller/Accueil");
?>