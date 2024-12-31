<?php

include '../config.php';

// Utilisez le champ approprié pour trier les résultats et limiter à 3 articles
$query = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 3";
$result = $conn->query($query);

?>

<main>
    <!-- HERO SECTION -->
    <div class="hero">
        <div class="container">
            <div class="left">
                <h1 class="h1">Welcome at <b>CODING&nbsp;HQ</b> our blog</h1>
                <p class="h3">Specialised in <abbr title="Accessibility">web development</abbr> disposed to save you</p>
                <div class="btn-group">
                    <a href="#" class="btn btn-secondary">A propos</a>
                </div>
            </div>
            <div class="right">
                <div class="pattern-bg"></div>
                <div class="img-box">
                    <img src="image/publication/banner1.jpg" alt="Image de garde" class="hero-img">
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="container">
            <!-- BLOG SECTION -->
            <div class="blog">
                <h2 class="h2">Recement ajouter</h2>
                <div class="blog-card-group row" id="article-container">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="blog-card col-sm-8 col-md-6 col-lg-4">
                            <div class="blog-card-banner">
                                <img src="<?php echo htmlspecialchars($row['img_cover_url']); ?>" alt="<?php echo htmlspecialchars($row['name_art']); ?>" width="100" class="blog-banner-img">
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
                <button class="btn load-more" id="load-more">Load More</button>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let offset = 3; // Initial offset
    const loadMoreButton = document.getElementById('load-more');
    const articleContainer = document.getElementById('article-container');

    loadMoreButton.addEventListener('click', function() {
        fetch(`load_more.php?offset=${offset}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    data.forEach(article => {
                        const articleElement = document.createElement('div');
                        articleElement.classList.add('blog-card', 'col-sm-8', 'col-md-6', 'col-lg-4');
                        articleElement.innerHTML = `
                            <div class="blog-card-banner">
                                <img src="${article.img_cover_url}" alt="${article.name_art}" width="100" class="blog-banner-img">
                            </div>
                            <div class="blog-content-wrapper">
                                <div class="d-flex align-items-center">
                                    <button class="blog-topic text-tiny">${article.cat_art}</button>
                                    <div class="wrapper-flex">
                                        <div class="wrapper">
                                            <p class="text-sm">
                                                <span class="separator"></span>${new Date(article.created_at).toLocaleDateString()}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <h3>
                                    <a href="detailsContent.php?id=${article.id}" class="h3">${article.name_art}</a>
                                </h3>
                                <p class="blog-text">
                                    ${article.des_art.substring(0, 150)}...
                                </p>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <a href="detailsContent.php?id=${article.id}"><u class="read-more">Read More...</u></a>
                                    <a href="#" class="like" data-id="${article.id}">Liker</a>
                                    <textarea name="" id="" placeholder="Commenter ici..."></textarea>
                                </div>
                            </div>
                        `;
                        articleContainer.appendChild(articleElement);
                    });
                    offset += 3;
                } else {
                    loadMoreButton.disabled = true;
                    loadMoreButton.textContent = 'No more articles';
                }
            })
            .catch(error => console.error('Error:', error));
    });
});
</script>