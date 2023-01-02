<?php
session_start();

include("../Utils/db.php");


error_reporting(0);

if(isset($_SESSION['email'])){
    header('Location:../Views/api.php');}
else{
    header('Location:../Views/login.php');
}

?>