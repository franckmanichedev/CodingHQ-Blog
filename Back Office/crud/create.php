<?php
include '../config.php';

// Vérifiez si l'ID du type de visa est passé en paramètre
if (isset($_GET['type_visa_id'])) {
    $type_visa_id = $_GET['type_visa_id'];

    // Vérifiez si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $libelle = $conn->real_escape_string($_POST['libelle']);
        $description = $conn->real_escape_string($_POST['description']);

        // Insérez la nouvelle étape dans la base de données
        $query = "INSERT INTO procedure_visa (id_visa, libelle_procedure, description_procedure) VALUES ('$type_visa_id', '$libelle', '$description')";
        if ($conn->query($query)) {
            echo "Étape ajoutée avec succès.";
            header("Location: ../crud/details-visa.php?id=$id_visa");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'étape : " . $conn->error;
        }
    }
} else {
    echo "ID du type de visa non spécifié.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une étape</title>
    <link href="../../../../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../bootstrap-icons-1.11.0/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
</head>
<body>
    <main>
        <section id="profil-operation">
            <?php include '../../../left.php'; ?>
        </section>
        <section>
            <div class="right">    
                <div class="page-title d-flex justify-content-between">
                    <h1>Ajouter une étape</h1>
                    <a href="help" class="btn btn-primary">Aide ?</a>
                </div>
                <div class="page-content d-flex">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-0 mb-5 d-flex flex-column justify-content-center align-items-center">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?type_visa_id=' . $type_visa_id; ?>" method="POST">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-6 col-lg-6">
                                            <label for="libelle">Libellé :</label><br>
                                            <input type="text" name="libelle" class="maj-char" required>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <label for="description">Description :</label><br>
                                            <input type="text" name="description" class="maj-char" required>
                                        </div>
                                    </div>
                                    <div class="row mt-5 d-flex justify-content-center align-items-center gap-4">
                                        <!-- Bouton pour soumettre le formulaire -->
                                        <input type="submit" class="btn btn-primary" value="Ajouter l'étape">

                                        <!-- Bouton pour annuler et retourner à visa-details.php -->
                                        <a href="visa-details.php?id=<?php echo $type_visa_id; ?>" class="btn btn-primary close">Annuler</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>