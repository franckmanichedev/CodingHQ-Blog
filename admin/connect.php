<?php
include '../config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        header("Location: ../Back Office/index.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Panda Login Form</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&amp;display=swap'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
  <form method="POST" action="../Back Office/index.php">
    <label for="adminname">Entrer votre nom administrateur</label>
    <input type="email" id="adminname" name="email" placeholder="Email" />
    <label for="password">Entrer votre mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Password" />
    <button>Connection</button>
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