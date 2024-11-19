<?php

include '../config.php';
include 'header.php';
include 'contenu.php';

if (isset($_POST['poster'])) {
    $nameart = htmlspecialchars($_POST['nameart']);
    $description = htmlspecialchars($_POST['description']);
    $category = htmlspecialchars($_POST['category']);
    $public = htmlspecialchars($_POST['public']);

    //Uploader les fichiers dans la BD
    if ($_FILES['coverimage']['size'] > 0 && $_FILES['pubimage']['size'] > 0) {
        //Récupération des informations des fichiers
        $coverimage = $_FILES['coverimage'];
        $pubimage = $_FILES['pubimage'];

        //Chemin de stockage des fichiers
        $coverimage_path = "uploads/" . basename($coverimage['name']);
        $pubimage_path = "uploads/" . basename($pubimage['name']);

        //Vérification du type de fichier
        $allowed_types = array('jpg', 'png', 'jpeg');
        $coverimage_extension = pathinfo($coverimage['name'], PATHINFO_EXTENSION);
        $pubimage_extension = pathinfo($pubimage['name'], PATHINFO_EXTENSION);

        if (in_array($coverimage_extension, $allowed_types) && in_array($pubimage_extension, $allowed_types)) {
            move_uploaded_file($coverimage['tmp_name'], $coverimage_path);
            move_uploaded_file($pubimage['tmp_name'], $pubimage_path);

            // Enregistrements de chemin dans la BD
            $coverimage_url = $coverimage_path;
            $pubimage_url = $pubimage_path;

            //Préparation de la requête
            $stmt = $conn->prepare("INSERT INTO articles (name_art, cat_art, des_art, img_cover_url, img_pub_url, public) VALUES (?, ?, ?, ?, ?, ?)");

            if ($stmt === false) {
                die("Erreur de preparation de la requete : " . $conn->error);
            }

            $stmt->bind_param("ssssss", $nameart, $category, $description, $coverimage_url, $pubimage_url, $public);
    
            if ($stmt->execute()) {
                echo "Enregistrement effectué avec succès.";
            } else {
                echo "Échec d'enregistrement : " . $stmt->error;
            }
            $stmt->close();
        }
    } else {
        echo "Veuillez sélectionner les fichiers PNG, JPG, JPEG, qui sont autorisés à uploader";
    }
} else {
    echo "Veuillez sélectionner une raison";
}

?>