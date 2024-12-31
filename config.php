<?php
$servername = "localhost";
$dbname = "blog";
$username = "root";
$password = "";

$conn = new MySqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("ERREUR: Oops, il y'a eu une erreur de connexion." . $conn->connect_error);
} else {
    echo "<div id='popup' class='popup'>
            <div class='popup-content'>
                <p>Connexion db réussie 
                    <span class='close'>&times;</span>
                </p>
            </div>
          </div>
          <script>
            document.addEventListener('DOMContentLoaded', function() {
                var popup = document.getElementById('popup');
                var close = document.getElementsByClassName('close')[0];
                popup.style.display = 'block';
                close.onclick = function() {
                    popup.style.display = 'none';
                }
                window.onclick = function(event) {
                    if (event.target == popup) {
                        popup.style.display = 'none';
                    }
                }
            });
          </script>";
}
?>