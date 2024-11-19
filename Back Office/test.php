<?php
// Vérifiez si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['poster'])) {

    try {

        // Récupérez les données du formulaire
        $name_art = htmlspecialchars($_POST['nameart']);
        $description = htmlspecialchars($_POST['description']);
        $category = htmlspecialchars($_POST['category']);
        $public = htmlspecialchars($_POST['public']);
        $creation = date('Y-m-d H:i:s');
        $nbre_like = 0;
        $nbre_comment = 0;
        $options = null; // Mettez une valeur par défaut si nécessaire

        // Gestion des fichiers
        $cover_image = null;
        $pub_image = null;

        // Vérifiez et téléchargez l'image de couverture
        if (isset($_FILES['coverimage']) && $_FILES['coverimage']['error'] === UPLOAD_ERR_OK) {
            $cover_image = 'uploads/' . basename($_FILES['coverimage']['name']);
            move_uploaded_file($_FILES['coverimage']['tmp_name'], $cover_image);
        }

        // Vérifiez et téléchargez l'image de publication
        if (isset($_FILES['pubimage']) && $_FILES['pubimage']['error'] === UPLOAD_ERR_OK) {
            $pub_image = 'uploads/' . basename($_FILES['pubimage']['name']);
            move_uploaded_file($_FILES['pubimage']['tmp_name'], $pub_image);
        }

        // Préparez la requête SQL
        $sql = "INSERT INTO article 
                (name_art, cat_art, des_art, img_cover_url, img_pub_url, public, nbre_like, nbre_comment, creation, options)
                VALUES (:name_art, :cat_art, :des_art, :img_cover_url, :img_pub_url, :public, :nbre_like, :nbre_comment, :creation, :options)";
        
        $stmt = $pdo->prepare($sql);

        // Exécutez la requête
        $stmt->execute([
            ':name_art' => $name_art,
            ':cat_art' => $category,
            ':des_art' => $description,
            ':img_cover_url' => $cover_image,
            ':img_pub_url' => $pub_image,
            ':public' => $public,
            ':nbre_like' => $nbre_like,
            ':nbre_comment' => $nbre_comment,
            ':creation' => $creation,
            ':options' => $options,
        ]);

        echo "Article enregistré avec succès !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
