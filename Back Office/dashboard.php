<?php

include "../config.php";
include "header.php";
include "dashcontent.php";

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
                        echo "<th>Matricule</th>";
                        echo "<th>Nom</th>";
                        echo "<th>Age</th>";
                        echo "<th>Action</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                // Parcourt les résultats et affiche chaque ligne de la table
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td class='maj-char'>" . $row['nom_art'] . "</td>";
                        echo "<td class='maj-char'>" . $row['cat_art'] . "</td>";
                        echo "<td class='maj-char'>" . $row['creator'] . "</td>";
                        echo "<td class='maj-char'>" . $row['nbre_like'] . "</td>";
                        echo "<td class='maj-char'>" . $row['nbre_comment'] . "</td>";
                        echo "<td>";
                            // Liens pour voir, modifier ou supprimer l'étudiant
                            echo '<a href="read.php?id='. $row['id'] .'" class="me-3"><img src="bootstrap-icons-1.11.0/eye.svg"></a>';
                            echo '<a href="update.php?id='. $row['id'] .'" class="me-3"><img src="bootstrap-icons-1.11.0/pencil.svg"></a>';
                            echo '<a href="delete.php?id='. $row['id'] .'"><img src="bootstrap-icons-1.11.0/trash.svg"></a>';
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