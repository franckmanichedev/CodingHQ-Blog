<?php
session_start();
$adminName = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '';

// Récupérer l'article le plus liké
$mostLikedQuery = "SELECT name_art, nbre_like FROM articles ORDER BY nbre_like DESC LIMIT 1";
$mostLikedResult = $conn->query($mostLikedQuery);
$mostLikedArticle = $mostLikedResult->fetch_assoc();

// Récupérer l'article le plus commenté
$mostCommentedQuery = "SELECT name_art, nbre_comment FROM articles ORDER BY nbre_comment DESC LIMIT 1";
$mostCommentedResult = $conn->query($mostCommentedQuery);
$mostCommentedArticle = $mostCommentedResult->fetch_assoc();
?>

            <section id="form">
                <h3>Bienvenu, <span><?php echo !empty($adminName) ? htmlspecialchars($adminName) : ''; ?></span></h3>
                <div class="info row d-flex justify-content-center align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-5 d-flex flex-column justify-content-center align-items-center">
                        <p>ARTICLE LE PLUS LIKER</p>
                        <h4><?php echo htmlspecialchars($mostLikedArticle['name_art']); ?></h4>
                        <p><span><?php echo htmlspecialchars($mostLikedArticle['nbre_like']); ?></span> Likes</p>
                    </div>
                    <div class="separateur col-sm-2 col-md-2 col-lg-2"></div>
                    <div class="col-sm-12 col-md-12 col-lg-5 d-flex flex-column justify-content-center align-items-center">
                        <p>ARTICLE LE PLUS COMMENTER</p>
                        <h4><?php echo htmlspecialchars($mostCommentedArticle['name_art']); ?></h4>
                        <p><span><?php echo htmlspecialchars($mostCommentedArticle['nbre_comment']); ?></span> Commentaire</p>
                    </div>
                </div>
                <form method="POST" action="index.php" class="row" enctype="multipart/form-data">
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                        <label for="">Nom de l'article :</label>
                        <input type="text" name="nameart" id="">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                        <label for="">Description :</label>
                        <input type="text" name="description" id="">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                        <label for="">Catégorie :</label>
                        <input type="text" name="category" id="">
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                        <label for="">Public :</label>
                        <div class="input-field">
                            <textarea name="public" id=""></textarea>
                            <i class="bi bi-bookmark note-icon"></i>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 d-flex flex-column justify-content-center">
                        <label for="">Image de couverture :</label>
                        <div class="importer d-flex flex-column justify-content-center">
                            <input type="file" name="coverimage" accept="image/*" id="file-input" style="display: none;">
                            <label for="file-input" class="choose">Importer un fichier</label>
                            <img id="image-preview" width="75px" height="75px" style="border-radius: 10px;">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 d-flex flex-column justify-content-center">
                        <label for="">Image de publication :</label>
                        <div class="importer d-flex flex-column justify-content-center">
                            <input type="file" name="pubimage" accept="image/*" id="file-input-un" style="display: none;">
                            <label for="file-input-un" class="choose">Importer un fichier</label>
                            <img id="image-preview-un" width="75px" height="75px" style="border-radius: 10px;">
                        </div>
                    </div>
                    <button class="col-sm-12 col-md-12 col-lg-4 d-flex flex-column justify-content-center poster" type="submit" name="poster">Upload</button>
                </form>
            </section>