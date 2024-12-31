<!-- Inscription -->
<?php
include '../config.php';

$successregister = "";
$failedregister = "";
$failedSearchUser = "";
$wrontPassword = "";

//Verifier si le formulaire d'inscription est soumis
if (isset($_POST['signup'])) {
    $username = $_POST['signname'];
    $email = $_POST['signemail'];
    $password = password_hash($_POST['signpassword'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (user_name, email, password) VALUES (?, ?, ?)"); // preparing and binding provides an extra layer of protection to the code to avoid sql injection
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $successregister = "Enregistrement effectuer avec success.";
    } else {
        $failedregister = "Echec d'enregistrement.";
    }
    $stmt->close();
}

//Verifier si le formulaire de connexion est soumis
if (isset($_POST['signin'])) {
	session_start();
	
    $email = $_POST['logemail'];
    $password = $_POST['logpassword'];

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    //$user = $result->fetch_assoc();

    // if (!$user) {
	// 	echo "Utilisateur introuvable";
	// } else
	// if(!password_verify($password, $user['password'])) {
    //     echo "Mot de passe incorrect";
	// 	echo "Mot de passe saisi:" . $password . "<br>";
	// 	echo "Mot de passe stocke:" . $user['password'] . "<br>";
    // } else {
    //     $_SESSION['id'] = $user['id'];
    //     header("Location: home.php");
    //     exit();
    // }

	if ($result->num_rows === 0) {
		$failedSearchUser = "Utilisateur introuvable";
	} else {
		$user = $result->fetch_assoc();
		
		if(!isset($user['password'])) {
			echo "Erreur lors de la recuperation du mot de passe";
		} elseif(!password_verify($password, $user['password'])) {
		    $wrontPassword = "Mot de passe incorrect";
			echo "Mot de passe saisi:" . $password . "<br>";
			echo "Mot de passe stocke:" . $user['password'] . "<br>";
		} else {
			$_SESSION['id'] = $row['id'];
			$_SESSION['user_name'] = $row['user_name']
		    header("Location: ../Front Office/index.php");
		    exit();
		}	
	}
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Double Slider Sign in/up Form</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container" id="container">

	<!-- Partie d'inscription de l'user -->
	<div class="form-container sign-up-container">
		<form method="POST" action="#">
			<h1>Creer compte</h1>
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span> -->
			<input type="text" name="signname" placeholder="Votre nom" />
			<input type="email" name="signemail" placeholder="Email" />
			<input type="password" name="signpassword" placeholder="Mot de passe" />
			<button name="signup" type="submit">S'inscrire</button>
			<p class="otherUseIt" style="color: red; margin: -1em 0 3em; width: 80%; text-align: center;"><?php echo !empty($successregister) ? $successregister : ''; ?></p>
			<p class="otherUseIt" style="color: red; margin: -1em 0 3em; width: 80%; text-align: center;"><?php echo !empty($failedregister) ? $failedregister : ''; ?></p>
		</form>
	</div>

	<!-- Partie de connexion a son compte user -->
	<div class="form-container sign-in-container">
		<form method="POST" action="../Front Office/index.php">
			<h1>Se connecter</h1>
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span> -->
			<input type="email" name="logemail" placeholder="Email" />
			<p class="otherUseIt" style="color: red; margin: -1em 0 3em; width: 80%; text-align: center;"><?php echo !empty($failedSearchUser) ? $failedSearchUser : ''; ?></p> 
			<input type="password" name="logpassword" placeholder="Mot de passe" />
			<p class="otherUseIt" style="color: red; margin: -1em 0 3em; width: 80%; text-align: center;"><?php echo !empty($wrontPassword) ? $wrontPassword : ''; ?></p> 
			<a href="#">Mot de passe oublier</a>
			<button name="signin" type="submit">Se connecter</button>
			<p class="otherUseIt" style="color: red; margin: -1em 0 3em; width: 80%; text-align: center;"><?php echo !empty($wrontPassword) ? $wrontPassword : ''; ?></p> 
		</form>
	</div>

	<!-- Message de bienvenu a afficher a l'utilisateur pour effectuer une action -->
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>De retour!</h1>
				<p>Pour vour reconnecter a votre compte veuillez entrer vos informations personelle</p>
				<button class="ghost" id="signIn">Se connecter</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Salut, bienvenue!</h1>
				<p>Entrer vos informations pour commencer a profiter de nos offres</p>
				<button class="ghost" id="signUp">S'inscrire</button>
			</div>
		</div>
	</div>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>