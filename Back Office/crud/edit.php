<?php
include "../../config.php";

// Vérifiez si l'ID de l'utilisateur est passé en paramètre
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérez les informations actuelles de l'utilisateur
    $stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "ID de l'article non spécifié.";
    exit();
}

// Vérifiez si le formulaire a été soumis pour mettre à jour les informations
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editPost"])) {
    $newNameArt = $conn->real_escape_string($_POST["newnameart"]);
    $newDescription = $conn->real_escape_string($_POST["newdescription"]);
    $newCategory = $conn->real_escape_string($_POST["newcategory"]);
    $newPublic = $conn->real_escape_string($_POST["newpublic"]);
    $newCoverimage = $conn->real_escape_string($_POST["newcoverimage"]);

    // newnameart newdescription newcategory newpublic newcoverimage newpubimage editPost

    //Verifier si le numero de telephone ou l'email est deja utiliser par un autre clients
    // $check_query = "SELECT * FROM clients_voyageurs WHERE (telephone = '$newNum' OR email = '$newEmail') AND id != '$id'";
    // $check_result = $conn->query($check_query);

    // if ($check_result->num_rows > 0) {
    //     // Si le numéro de téléphone ou l'email est déjà utilisé, affiche un message d'erreur
    //     echo "Erreur : Le numéro de téléphone ou l'email est déjà utilisé par un autre client.";
    // } else {

        // Mettez à jour les informations de l'utilisateur dans la base de données
        $stmt = $conn->prepare("UPDATE articles SET newnameart = ?, newdescription = ?, newcategory = ?, newpublic = ?, newcoverimage = ? WHERE id = ?");
        $stmt->bind_param("ssissi", $newNameArt, $newDescription, $newCategory, $newPublic, $newCoverimage, $id);

        if ($stmt->execute()) {
            echo "Informations mises à jour avec succès.";
            header("Location: ../dashboard.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour des informations de l'utilisateur.";
        }
        $conn->close();
    //}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un utilisateur</title>
    <link href="../bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap-5.3.2-dist/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="../bootstrap-icons-1.11.0/bootstrap-icons.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <style>
        .wrapper{
            width: 95%;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .maj-char{
            text-transform: uppercase;
        }
        .close:hover{
            background: red;
            color: white;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center; 
            align-items: center;
        }
        form div div label{
            font-weight: bold;
        }
        form div div input{
            height: 3em;
            font-weight: 500;
            width: 100%;
        }
        .type-visa{
            place-items: start;
        }
    </style>
</head>
<body>
    <main class="d-flex">
        <section>
            <div class="right">
                <div class="page-content d-flex">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mt-0 mb-5 d-flex flex-column justify-content-center align-items-center">
                                <div class="mt-5 mb-3 d-flex justify-content-between">
                                    <h1>Modifier les informations du voyageur</h1>
                                </div>    
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $id; ?>" method="POST">
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                                        <label for="">Nom de l'article :</label>
                                        <input type="text" name="newnameart" id="">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                                        <label for="">Description :</label>
                                        <input type="text" name="newdescription" id="">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                                        <label for="">Catégorie :</label>
                                        <input type="text" name="newcategory" id="">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                                        <label for="">Public :</label>
                                        <input type="text" name="newpublic" id="">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                                        <label for="">Image de couverture :</label>
                                        <div class="importer d-flex flex-column justify-content-center">
                                            <input type="file" name="newcoverimage" accept="image/*" id="file-input" style="display: none;">
                                            <label for="file-input" class="choose">Importer un fichier</label>
                                            <img id="image-preview" width="75px" height="75px" style="border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                                        <label for="">Image de publication :</label>
                                        <div class="importer d-flex flex-column justify-content-center">
                                            <input type="file" name="newpubimage" accept="image/*" id="file-input-un" style="display: none;">
                                            <label for="file-input-un" class="choose">Importer un fichier</label>
                                            <img id="image-preview-un" width="75px" height="75px" style="border-radius: 10px;">
                                        </div>
                                    </div>
                                    <button type="submit" name="editPost">Modifier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>

    </script>
</body>
</html>
