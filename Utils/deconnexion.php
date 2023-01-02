<?php 

session_start();

include("../Utils/db.php");


error_reporting(0);

if(isset($_SESSION['email'])){
    
session_destroy();

header("Location: ../Views/login.php");
}
else{
    header('Location:../Views/index.php');
}

?>