<?php
session_start();

include("../Utils/db.php");


error_reporting(0);

if(isset($_SESSION['email'])){
    header('Location:../Views/profil.php');}
else{
    header('Location:../Views/login.php');
}

?>