<?php

include "../config.php";

// Vérifiez si l'ID de l'article est passé dans l'URL
if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);

    // Récupérez les détails de l'article à partir de la base de données
    $query = "SELECT * FROM articles WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Vérifiez si l'article existe
    if ($result->num_rows > 0) {
        $article = $result->fetch_assoc();
    } else {
        echo "Article non trouvé.";
        exit;
    }

    // Récupérez le nombre de commentaires
    $comment_query = "SELECT nbre_comment FROM articles WHERE id = ?";
    $comment_stmt = $conn->prepare($comment_query);
    $comment_stmt->bind_param("i", $article_id);
    $comment_stmt->execute();
    $comment_result = $comment_stmt->get_result();
    $comment_count = $comment_result->fetch_assoc()['nbre_comment'];

} else {
    echo "ID d'article non spécifié.";
    exit;
}

// Récupérez les trois articles les plus récents
$recent_query = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 3";
$recent_result = $conn->query($recent_query);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'article</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* Ajoutez votre CSS ici */
</style>
<body>
    <main>
        <div class="container">
            <h1 class="article-title"><?php echo htmlspecialchars($article['name_art']); ?></h1>
            <div class="article-banner">
                <img src="<?php echo htmlspecialchars($article['img_pub_url']); ?>" alt="<?php echo htmlspecialchars($article['name_art']); ?>" class="article-img">
            </div>
            <div class="article-details">
                <div class="article-meta">
                    <p><strong>Catégorie:</strong> <?php echo htmlspecialchars($article['cat_art']); ?></p>
                    <p><strong>Date de publication:</strong> <?php echo date('M d, Y', strtotime($article['created_at'])); ?></p>
                    <!-- <p><strong>Auteur:</strong> <?php echo htmlspecialchars($article['author']); ?></p> -->
                    <p><strong>Commentaires:</strong> <?php echo $comment_count; ?></p>
                    <p><strong>Likes:</strong> <?php echo $article['nbre_like']; ?></p>
                </div>
                <div class="article-content">
                    <h2>Description</h2>
                    <p><?php echo nl2br(htmlspecialchars($article['des_art'])); ?></p>
                    <h2>Publication</h2>
                    <p><?php echo htmlspecialchars($article['public']); ?></p>
                </div>
                <div class="article-image">
                    <h2>Image de publication</h2>
                    <img src="<?php echo htmlspecialchars($article['img_pub_url']); ?>" alt="<?php echo htmlspecialchars($article['name_art']); ?>" class="article-img">
                </div>
            </div>

            <!-- SECTION DES TROIS ARTICLES LES PLUS RÉCENTS -->
            <div class="recent-articles">
                <h2 class="h2">Trois articles récents</h2>
                <div class="blog-card-group row">
                    <?php while ($row = $recent_result->fetch_assoc()): ?>
                        <div class="blog-card col-sm-8 col-md-6 col-lg-4">
                            <div class="blog-card-banner">
                                <img src="<?php echo htmlspecialchars($row['img_cover_url']); ?>" alt="<?php echo htmlspecialchars($row['name_art']); ?>" class="blog-banner-img">
                            </div>
                            <div class="blog-content-wrapper">
                                <div class="d-flex align-items-center">
                                    <button class="blog-topic text-tiny"><?php echo htmlspecialchars($row['cat_art']); ?></button>
                                    <div class="wrapper-flex">
                                        <div class="wrapper">
                                            <p class="text-sm">
                                                <span class="separator"></span><?php echo date('M d, Y', strtotime($row['created_at'])); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <h3>
                                    <a href="detailsContent.php?id=<?php echo $row['id']; ?>" class="h3"><?php echo htmlspecialchars($row['name_art']); ?></a>
                                </h3>
                                <p class="blog-text">
                                    <?php echo htmlspecialchars(substr($row['des_art'], 0, 150)) . '...'; ?>
                                </p>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <a href="detailsContent.php?id=<?php echo $row['id']; ?>"><u class="read-more">Read More...</u></a>
                                    <a href="#" class="like" data-id="<?php echo $row['id']; ?>">Liker</a>
                                    <textarea name="" id="" placeholder="Commenter ici..."></textarea>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
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
</body>
</html>