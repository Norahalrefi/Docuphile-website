<?php
session_start();
include 'dbconfig.php'; 

if (isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id']; 
    $conn = (new Dbh())->connect();

    $sql = "
        SELECT m.id, m.title, m.description, m.image 
        FROM watchlist w
        JOIN movies m ON w.movie_id = m.id
        WHERE w.user_id = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($movie_id, $title, $description, $image);
    $watchlist = [];

    while ($stmt->fetch()) {
        $watchlist[] = [
            'id' => $movie_id,
            'title' => $title,
            'description' => $description,
            'image' => $image
        ];
    }
    echo json_encode($watchlist);

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'User not logged in']);
}
?>
