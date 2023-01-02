<?php session_start();  ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../Assets/js/Etsena.js"> </script>
    <link rel="stylesheet" href="../Assets/css/index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<div class="cotn_principal">
  <div class="cont_centrar">
    <div class="cont_login">
      <div class="cont_info_log_sign_up">
        <div class="col_md_login">
          <div class="cont_ba_opcitiy">
        
            <h2>LOGIN</h2>  
            <p>Cliquer sur CONNEXION pour se connecter .</p> 
            <button class="btn_login" onclick="cambiar_login()">CONNEXION</button>
          </div>
        </div>
        <div class="col_md_sign_up">
          <div class="cont_ba_opcitiy">

            <h2>SIGN UP</h2>
            <p>Si vous n'avez pas encore du compte E-tsena, créer ici.</p>
            <button class="btn_sign_up" onclick="cambiar_sign_up()">CRÉER UN COMPTE</button>
          </div>
        </div>
      </div>

    
      <div class="cont_back_info">
        <div class="cont_img_back_grey">
          <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
        </div>
       
      </div>
      <div class="cont_forms" >
        <div class="cont_img_back_">
          <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
        </div>

  <!--connecté-->

<?php 

include "../Utils/db.php";

error_reporting(0);

if (isset($_SESSION['username'])) {
    header('Location:profil.php');
}

if (isset($_POST['submite'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

  
	$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
	$result = mysqli_query($con, $sql);

  if ($email=='admin@gmail.com' && $password == '1234'){
    header('Location:admin/admin_home.php');
  }
	elseif ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['nom'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['email'] = $row['email'];
		header('Location:profil.php');
	} else {
		echo "<script>alert('Email ou mot de passe est erroné.')</script>";
	}
}

?>



        <div class="cont_form_login">
          <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>


          <h2>LOGIN</h2>
          <form action="" method="POST">
            <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required/>
            <input type="password" placeholder="Mot de passe" name="password" value="<?php echo $_POST['password']; ?>" required/>
            <button name="submite" class="btn_login" >CONNEXION</button>
          </form>
        </div>
  



  <!--créer un compte-->
<?php
if (isset($_SESSION['username'])) {
    header("Location: profil.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
  $phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if ($password) {
		$sql = "SELECT * FROM user WHERE email='$email'";
		$result = mysqli_query($con, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (nom, phone, email, password)
					VALUES ('$username', '$phone', '$email', '$password')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				echo "<script>alert('Enregistrement de l'utilisateur terminé.')</script>";
				$username = "";
        $phone = "";
				$email = "";
				$_POST['password'] = "";
			} else {
				echo "<script>alert('Quelque chose s'est mal passé.')</script>";
			}
		} else {
			echo "<script>alert('Email existe déja.')</script>";
		}
		
	} else {
		echo "<script>alert('Le mot de passe ne correspond pas.')</script>";
	}
}
?>


          <div class="cont_form_sign_up">
          <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>

            <h2>SIGN UP</h2>
            <form action="" method="POST">
              <input type="text" placeholder="Nom d'utilisateur" name="username" value="<?php echo $username; ?>" required/>
              <input type="text" placeholder="Phone" name="phone" value="<?php echo $phone; ?>" required/>
              <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required/>
              <input type="password" placeholder="Mot de passe" name="password" value="<?php echo $_POST['password']; ?>" required/>
              <button name="submit" class="btn_sign_up" >S'ENREGISTRER</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>