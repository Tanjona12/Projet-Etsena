<?php

include 'db.php';


if(isset($_POST['insert'])){
    
    $nom  = clean($_POST['nom']);
    $reference = clean($_POST['reference']);
    $prix = clean($_POST['prix']);
    $quantite = clean($_POST['quantite']);
    $detail = clean($_POST['detail']);
    
    $query = "INSERT INTO `produit` (nom,reference,prix,quantite,detail) VALUES ('".escape($nom)."','".escape($reference)."','".escape($prix)."','".escape($quantite)."','".escape($detail)."') ";
    
    $result = mysqli_query($con,$query);
    
    if($result){
        
        header('location:../Views/admin/admin_shop.php');
    }
    
}


?>