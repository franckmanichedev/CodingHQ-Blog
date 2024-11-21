<?php

include '../config.php';
include 'header.php';
include 'contenu.php';

if (isset($_POST['poster'])) {
    // Récupération des données du formulaire
    $nameart = htmlspecialchars($_POST['nameart']);
    $description = htmlspecialchars($_POST['description']);
    $category = htmlspecialchars($_POST['category']);
    $public = htmlspecialchars($_POST['public']);

    // Vérification des fichiers uploadés
    if (!empty($_FILES['coverimage']['name']) && !empty($_FILES['pubimage']['name'])) {
        // Récupération des informations des fichiers
        $coverimage = $_FILES['coverimage'];
        $pubimage = $_FILES['pubimage'];

        // Définir le chemin de stockage des fichiers
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true); // Crée le dossier s'il n'existe pas
        }

        $coverimage_path = $upload_dir . uniqid('cover_') . '.' . pathinfo($coverimage['name'], PATHINFO_EXTENSION);
        $pubimage_path = $upload_dir . uniqid('pub_') . '.' . pathinfo($pubimage['name'], PATHINFO_EXTENSION);

        // Vérification des types de fichiers
        $allowed_types = ['jpg', 'jpeg', 'png'];
        $coverimage_extension = strtolower(pathinfo($coverimage['name'], PATHINFO_EXTENSION));
        $pubimage_extension = strtolower(pathinfo($pubimage['name'], PATHINFO_EXTENSION));

        if (in_array($coverimage_extension, $allowed_types) && in_array($pubimage_extension, $allowed_types)) {
            // Déplacement des fichiers vers le dossier de stockage
            if (move_uploaded_file($coverimage['tmp_name'], $coverimage_path) && move_uploaded_file($pubimage['tmp_name'], $pubimage_path)) {
                // Préparer l'insertion des données dans la base de données
                $stmt = $conn->prepare("INSERT INTO articles (name_art, cat_art, des_art, img_cover_url, img_pub_url, public) VALUES (?, ?, ?, ?, ?, ?)");

                if ($stmt === false) {
                    die("Erreur de préparation de la requête : " . $conn->error);
                }

                // Lier les paramètres et exécuter la requête
                $stmt->bind_param("ssssss", $nameart, $category, $description, $coverimage_path, $pubimage_path, $public);

                if ($stmt->execute()) {
                    echo "Enregistrement effectué avec succès.";
                } else {
                    echo "Échec d'enregistrement : " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Erreur lors du téléchargement des fichiers.";
            }
        } else {
            echo "Types de fichiers autorisés : JPG, JPEG, PNG uniquement.";
        }
    } else {
        echo "Veuillez sélectionner les fichiers de type PNG, JPG, JPEG pour le téléchargement.";
    }
} else {
    echo "Formulaire non soumis.";
}

?>