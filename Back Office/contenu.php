<?php
    $adminName = "";
?>

<section id="form">
            <h3>Bienvenu, <span><?php echo !empty($adminName) ? $adminName : ''; ?></span></h3>
            <div class="info row d-flex justify-content-center align-items-center">
                <div class="col-sm-12 col-md-12 col-lg-5 d-flex flex-column justify-content-center align-items-center">
                    <p>ARTICLE LE PLUS LIKER</p>
                    <p>The best web accessibility tools for developers in 2021</p>
                    <p><span>200</span> Likes</p>
                </div>
                <div class="separateur col-sm-2 col-md-2 col-lg-2"></div>
                <div class="col-sm-12 col-md-12 col-lg-5 d-flex flex-column justify-content-center align-items-center">
                    <p>ARTICLE LE PLUS COMMENTER</p>
                    <p>How to connect a React frontend with a NodeJS/Express backend</p>
                    <p><span>142</span> Commentaire</p>
                </div>
            </div>
            <form method="POST" action="dashboard.php" class="row" enctype="multipart/form-data">
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                    <label for="">Nom de l'article :</label>
                    <input type="text" name="nameart" id="">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                    <label for="">Description :</label>
                    <input type="text" name="description" id="">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                    <label for="">Image de couverture :</label>
                    <div class="importer d-flex flex-column justify-content-center">
                        <input type="file" name="coverimage" accept="image/" id="file-input" style="display: none;">
                        <label for="file-input" class="choose">Importer un fichier</label>
                        <img id="image-preview" width="75px" height="75px" style="border-radius: 10px;">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                    <label for="">Categorie :</label>
                    <input type="text" name="category" id="">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                    <label for="">Image de publication :</label>
                    <div class="importer d-flex flex-column justify-content-center">
                        <input type="file" name="pubimage" accept="image/" id="file-input-un" style="display: none;">
                        <label for="file-input-un" class="choose">Importer un fichier</label>
                        <img id="image-preview-un" width="75px" height="75px" style="border-radius: 10px;">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-column justify-content-center">
                    <label for="">Publication :</label>
                    <textarea rows="5" name="public" id="" placeholder="Saisissez votre article ici"></textarea>
                </div>
                <button class="col-sm-1 col-md-1 col-lg-1" type="submit" name="poster">PUBLIER</button>
            </form>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>