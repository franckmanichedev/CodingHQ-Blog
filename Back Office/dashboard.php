<?php

include "./header.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Assure la compatibilité mobile -->
    
    <!-- Inclusion des fichiers CSS Bootstrap pour le style -->
    <link href="./bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap-5.3.2-dist/css/bootstrap-grid.min.css" rel="stylesheet">

    <!-- Inclusion des icônes Bootstrap -->
    <link href="../../bootstrap-icons-1.11.0/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        ul li{
            list-style: none"
        }
        /* Centrage horizontal du contenu principal et définition de sa largeur */
        .wrapper {
            width: 95%;
            margin: 0 auto;
        }
        /* Définit la largeur de la dernière colonne des tables */
        table tr td:last-child {
            width: 120px;
        }
        /* Met les noms en majuscules dans les colonnes correspondantes */
        .maj-char{
            text-transform: uppercase;
            font-weight: 400;
        }

        /*Style de mon bouton search */
        .container {
            width: 5%;
            display: flex;
            align-items: center;
        }

        .container .search-bar {
            background: transparent;
            border: none;
            outline: none;
            width: 0px;
            font-weight: 500;
            font-size: 16px;
            transition: 2.8s;
            position: relative;
            height: 40px;
            width: 25px;
            border-radius: 30px;
            padding: 10px 20px;
            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.4);
        }

        .container:hover .search-bar{
            width: 550px;
        }
        
        .container .btn-primary  {
            background: none;
            border: none;
            color: yellow;
            margin-left: -2em;
            font-weight: 900;
            font-size: 20px;
        }

        .bi-arrow-bar-left{
            font-weight: bold;
            font-size: 30px;
            border-radius: 50%;
            border: none;
            background-color: #aaa;
            padding: 6px 10px;
            cursor: pointer;
            transition: 0.2s;
        }
        .bi-arrow-bar-left:hover{
            transform: translatex(20em);
            background-color: transparent;
            color: black;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <!-- <a href=""><img src="../../bootstrap-icons-1.11.0/chevron-bar-left.svg" alt=""></a> -->
                    <a href="../index.html"><i class="bi bi-arrow-bar-left"></i></a>
                    <div class="mt-3 mb-3 d-flex justify-content-between">
                        <h2 class="pull-left">Liste des Administrateur</h2>
                        <form method="GET" class="container">
                            <input type="text" class="search-bar" name="search" placeholder="Rechercher un client...">
                            <button class="btn btn-primary">
                                <b class="btn-search"><i class="bi bi-search"></i></b>
                            </button>
                        </form>
                        <a href="crud/create.php" class="btn btn-success"><i class="bi bi-plus"></i> Ajouter</a>

                        <!-- Code pour rechercher un clients dans la base de donnee -->
                    </div>
                    
                    <?php
                        include "../config.php";
                    ?>
                    
                    <?php
                        require_once "../config.php";

                        // Requête SQL pour récupérer tous les étudiants
                        $sql = "SELECT * FROM articles";
                        
                        // Exécution de la requête et vérification des résultats
                        if ($result = mysqli_query($conn, $sql)) {
                            // Vérifie s'il y a des enregistrements dans la table 'etudiant'
                            if (mysqli_num_rows($result) > 0) {
                                // Si oui, commence à afficher un tableau HTML
                                echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Nom de l'article</th>";
                                            echo "<th>Categorie</th>";
                                            echo "<th>Likes</th>";
                                            echo "<th>Commentaire</th>";
                                            echo "<th>Actions</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    // Parcourt les résultats et affiche chaque ligne de la table
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td class='maj-char'>" . $row['name_art'] . "</td>";
                                            echo "<td class='maj-char'>" . $row['cat_art'] . "</td>";
                                            // echo "<td class='maj-char'>" . $row['creator'] . "</td>";
                                            echo "<td class='maj-char'>" . $row['nbre_like'] . "</td>";
                                            echo "<td class='maj-char'>" . $row['nbre_comment'] . "</td>";
                                            echo "<td>";
                                                // Liens pour voir, modifier ou supprimer l'étudiant
                                                echo '<a href="./crud/read.php?id='. $row['id'] .'" class="me-3"><img src="bootstrap-icons-1.11.0/eye.svg"></a>';
                                                echo '<a href="./crud/edit.php?id='. $row['id'] .'" class="me-3"><img src="bootstrap-icons-1.11.0/pencil.svg"></a>';
                                                echo '<a href="./crud/delete.php?id='. $row['id'] .'"><img src="bootstrap-icons-1.11.0/trash.svg"></a>';
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                echo "</table>";
                    
                                // Libère les résultats de la mémoire
                                mysqli_free_result($result);
                            } else {
                                // Si aucune donnée n'est trouvée, affiche un message
                                echo '<div class="alert alert-danger"><em>Aucun articles enregistrer...</em></div>';
                            }
                        } else {
                            // Si la requête échoue, affiche un message d'erreur
                            echo "Oops! Une erreur est survenue";
                        }
                    
                        // Ferme la connexion à la base de données
                        mysqli_close($conn);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
