<?php
include("../../Utils/db.php");

if(isset($_POST['insert']))
{
    $nom         = clean($_POST['nom']);
    $reference        = clean($_POST['reference']);
    $prix        = clean($_POST['prix']);
    $quantite        = clean($_POST['quantite']);
    $detail        = clean($_POST['detail']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];

    $location     = "images/".$image_name;


    move_uploaded_file($image, $location);


    $query = "INSERT INTO produit (nom,reference,prix,quantite,detail,image) VALUES ('".escape($nom)."', '".escape($reference)."','".escape($prix)."' , '".escape($quantite)."', '".escape($detail)."', '$image_name')";

    $result = mysqli_query($con,$query); 

    if($result == true)
    {
        header("Location:admin_shop.php");
    }
    else
    {
        die('error' . mysqli_error($con));
    }

}


?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="container">

    <div class="jumbotron text-center">
        <h2>SHOP ETSENA</h2>
    </div>
    <br>
<div class="row">
<div class="col-md-12">
    
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nom:</label>
        <input type="text" name="nom" class="form-control" placeholder="Entrer leur nom">
    </div>
    <div class="form-group">
        <label for="name">Reference:</label>
        <input type="text" name="reference" class="form-control" placeholder="Entrer leur reference">
    </div>
    <div class="form-group">
        <label for="name">Prix:</label>
        <input type="text" name="prix" class="form-control" placeholder="Entrer leur prix">
    </div>
    <div class="form-group">
        <label for="name">Quantité:</label>
        <input type="text" name="quantite" class="form-control" placeholder="Entrer leur quantité">
    </div>
    <div class="form-group">
        <label for="name">Détails:</label>
        <input type="text" name="detail" class="form-control" placeholder="Entrer leur détails">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <input type="file" class="btn btn-primary" name="image" class="form-control" placeholder="Entrer l'image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Insérer le donnée" name="insert">
    </div>
</form>
</div>
</div>

</div>
