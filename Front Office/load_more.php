<?php
include "../config.php";

if (isset($_GET['offset'])) {
    $offset = intval($_GET['offset']);
    $limit = 3;

    $query = "SELECT * FROM articles ORDER BY created_at DESC LIMIT ?, ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $articles = [];
    while ($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }

    echo json_encode($articles);
} else {
    echo json_encode([]);
}
?>