<?php
include '../config.php';

if (isset($_POST["signup"])) {
  $email = $_POST['email'];
  $adminname = $_POST['adminname'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Debugging: Print the email
  echo "Email entered: " . htmlspecialchars($email) . "<br>";

  $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $num_user = $result->num_rows;
  $stmt->close();

  // Debugging: Print the result of the query
  if ($num_user > 0) {
    echo "Email already exists.<br>";
  } else {
    $stmt = $conn->prepare("INSERT INTO admin (admin_name, email, `password`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $adminname, $email, $password);

    if ($stmt->execute()) {
      echo "Registration successful. <a href='connect.php'>Login</a>";
    } else {
      echo "Registration failed: " . $stmt->error;
    }
    $stmt->close();
  }
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
  <form method="post" action="register.php"> 
    <label for="adminname">Entrer nom nouvel administrateur</label>
    <input type="text" id="adminname" name="adminname" placeholder="adminname" />
    <label for="email">Votre Email</label>
    <input type="email" id="email" name="email" placeholder="Email" />
    <label for="password">Entrer votre mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Password" />
    <button type="submit" name="signup">Sign Up</button>
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