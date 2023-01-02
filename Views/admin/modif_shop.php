<?php
include("../../Utils/db.php");
?>

<?php 

if(isset($_GET['update'])){
    
    
    $id = $_GET['update'];
    

$query = "SELECT * FROM produit WHERE id = $id";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
            $nom  = $row['nom'];
            $reference = $row['reference'];
            $prix = $row['prix'];
            $quantite = $row['quantite'];
            $detail = $row['detail'];
            $image = $row['image'];

        }
    }
}

if(isset($_POST['update'])){
    

    $nom         = clean($_POST['nom']);
    $reference        = clean($_POST['reference']);
    $prix        = clean($_POST['prix']);
    $quantite        = clean($_POST['quantite']);
    $detail        = clean($_POST['detail']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];

    $location     = "images/".$image_name;

    move_uploaded_file($image, $location);

    $query  = "UPDATE produit SET ";
    $query .= "nom = '".escape($nom)."', ";
    $query .= "reference = '".escape($reference)."', ";
    $query .= "prix = '".escape($prix)."', ";
    $query .= "quantite = '".escape($quantite)."', ";
    $query .= "detail = '".escape($detail)."', ";
    $query .= "image = '{$image_name}' ";
    $query .= "WHERE id = {$id} ";
    
    $result = mysqli_query($con,$query);
    
    if($result){
        
        header('location:admin_shop.php');
    }
    else
    {
        die('error' . mysql_error($con));
    }
    
}

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="container">
    <div class="jumbotron text-center">
        <h2>SHOP ETSENA</h2>
    </div>
    <br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">NOM:</label>
        <input type="text" name="nom" class="form-control" placeholder="Entrer leur nom" value="<?php echo $nom ?>">
    </div>
    <div class="form-group">
        <label for="name">Reference:</label>
        <input type="text" name="reference" class="form-control" placeholder="Entrer leur reference" value="<?php echo $reference ?>">
    </div>
    <div class="form-group">
        <label for="name">Prix:</label>
        <input type="text" name="prix" class="form-control" placeholder="Entrer leur prix" value="<?php echo $prix ?>">
    </div>
    <div class="form-group">
        <label for="name">Quantité:</label>
        <input type="text" name="quantite" class="form-control" placeholder="Entrer leur quantité" value="<?php echo $quantite ?>">
    </div>
    <div class="form-group">
        <label for="name">Détails:</label>
        <input type="text" name="detail" class="form-control" placeholder="Entrer leur détails" value="<?php echo $detail ?>">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <img src= "<?= "images/".$image?>" alt="" width="100px" height="100px" class="thumbnail">
        <input type="file" name="image" class="form-control" placeholder="Entrer l'image" value="<?php echo $detail ?>">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Modifier le donnée" name="update">
    </div>
</form>

</div>
