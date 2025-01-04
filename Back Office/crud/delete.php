<?php
include "../../config.php";

// Vérification si l'ID de l'utilisateur à supprimer est présent dans l'URL et est numérique
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"]; // Récupère l'ID de l'utilisateur à partir de l'URL
} else {
    // Si l'ID n'est pas valide, affiche un message d'erreur et arrête le script
    $id = null; // Définir l'ID à NULL ou une valeur par défaut
    echo "ID de l'article non valide.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['confirmDelete']))) {
    // Si le formulaire de confirmation est soumis
    $stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Client supprimé avec succès!";
        $stmt->close();
        header("Location: ../dashboard.php");
        exit();
    } else {
        echo "Erreur lors de la suppression du client.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un utilisateur</title>

    <link href="../../../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../bootstrap-icons-1.11.0/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="./del.css">
</head>
<body>
    <div class="container">
        <h1>Supprimer l'étudiant</h1>

        <?php if ($id !== null) : ?>
            <p>Êtes-vous sûr de vouloir supprimer le client <?php echo $id; ?>?</p>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $id; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="confirmDelete" value="Oui, supprimer"> <!-- Bouton pour confirmer la suppression -->
                <a href="../dashboard.php">Non, annuler</a> <!-- Lien pour annuler et retourner à la liste des utilisateurs -->
            </form>
        <?php endif; ?>
        <!-- <?php
        // Vérification si l'ID est correct et si le formulaire de confirmation est soumis
        if ($id !== null && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmDelete"])) {
            // Ici, vous pouvez ajouter le code pour effectuer la suppression de l'utilisateur
            // Assurez-vous de gérer correctement la suppression et de rediriger l'utilisateur après suppression
        }
        ?> -->
    </div>