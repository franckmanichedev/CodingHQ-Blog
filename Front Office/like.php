<?php
include "../config.php";

if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);

    // Incrémentez le nombre de likes pour l'article
    $query = "UPDATE articles SET nbre_like = nbre_like + 1 WHERE id = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        echo "Erreur de préparation de la requête : " . $conn->error;
        exit;
    }
    $stmt->bind_param("i", $article_id);
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Erreur lors de l'exécution de la requête : " . $stmt->error;
    }
} else {
    echo "ID d'article non spécifié.";
}
?>