<?php
include '../config.php';
include 'head.php';
include 'header.php';

if (isset($_GET['category'])) {
    $category = $_GET['category'];

    // Récupérer les articles de la catégorie spécifiée
    $query = "SELECT * FROM articles WHERE cat_art = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "Catégorie non spécifiée.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles de la catégorie <?php echo htmlspecialchars_decode($category); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="container">
            <h1>Articles de la catégorie <?php echo htmlspecialchars($category); ?></h1>
            <div class="blog-card-group row">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="blog-card col-sm-8 col-md-6 col-lg-4">
                        <div class="blog-card-banner">
                            <img src="<?php echo htmlspecialchars($row['img_cover_url']); ?>" alt="<?php echo htmlspecialchars_decode($row['name_art']); ?>" width="100" class="blog-banner-img">
                        </div>
                        <div class="blog-content-wrapper">
                            <div class="d-flex align-items-center">
                                <button class="blog-topic text-tiny"><?php echo htmlspecialchars_decode($row['cat_art']); ?></button>
                                <div class="wrapper-flex">
                                    <div class="wrapper">
                                        <p class="text-sm">
                                            <span class="separator"></span><?php echo date('M d, Y', strtotime($row['created_at'])); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <h3>
                                <a href="detailsContent.php?id=<?php echo $row['id']; ?>" class="h3"><?php echo htmlspecialchars_decode($row['name_art']); ?></a>
                            </h3>
                            <p class="blog-text">
                                <?php echo nl2br(htmlspecialchars_decode(substr($row['des_art'], 0, 100))) . '...'; ?>
                            </p>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <a href="detailsContent.php?id=<?php echo $row['id']; ?>"><u class="read-more">Read More...</u></a>
                                <a href="#" class="like" data-id="<?php echo $row['id']; ?>">Liker</a>
                                <!-- <textarea name="" id="" placeholder="Commenter ici..."></textarea> -->
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.like').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var articleId = this.getAttribute('data-id');
                    fetch('like.php?id=' + articleId)
                        .then(response => response.text())
                        .then(data => {
                            if (data === 'success') {
                                alert('Article liké avec succès');
                                location.reload();
                            } else {
                                alert(data); // Affichez le message d'erreur détaillé
                            }
                        });
                });
            });
        });
    </script>
    <?php

    include "prefooter.php";
    include "footer.php";

    ?>
</body>
</html>