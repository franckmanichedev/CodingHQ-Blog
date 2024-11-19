<?php
    $servername = "localhost";
    $dbname = "blog";
    $username = "root";
    $password = "";

    $conn = new MySqli ($servername,$username,$password,$dbname);
    if($conn->connect_error ){
        die("ERREUR: Oops, il y'a eu une erreur de connexion." .$conn->connect_error);
    } else {
        echo "Connecion db reussit";
    }
?>