<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminname = $_POST['adminname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO admin (admin_name, email,password) VALUES (?, ?, ?)"); // preparing and binding provides an extra layer of protection to the code to avoid sql injection
    $stmt->bind_param("sss", $adminname, $email, $password); 

    if ($stmt->execute()) {
        echo "Enregistrement effectuer avec success. <a href='connect.php'>Connection</a>";
    } else {
        echo "Echec d'enregistrement." .$stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Panda Login Form</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&amp;display=swap'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
  <form method="POST" action="conect.php"> 
    <label for="adminname">Entrer nom nouvel administrateur</label>
    <input type="text" id="adminname" name="adminname" placeholder="adminname" />
    <label for="email">Votre Email</label>
    <input type="email" id="email" name="email" placeholder="Email" />
    <label for="password">Entrer votre mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Password" />
    <button type="submit">Inscription</button>
  </form>
  <div class="ear-l"></div>
  <div class="ear-r"></div>
  <div class="panda-face">
    <div class="blush-l"></div>
    <div class="blush-r"></div>
    <div class="eye-l">
      <div class="eyeball-l"></div>
    </div>
    <div class="eye-r">
      <div class="eyeball-r"></div>
    </div>
    <div class="nose"></div>
    <div class="mouth"></div>
  </div>
  <div class="hand-l"></div>
  <div class="hand-r"></div>
  <div class="paw-l"></div>
  <div class="paw-r"></div>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>