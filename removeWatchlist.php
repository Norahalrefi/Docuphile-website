<?php
session_start();
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['movieId'])) {
    $user_id = $_SESSION['user_id']; 
    $movie_id = $_POST['movieId'];  

    $conn = (new Dbh())->connect();
    $sql = "DELETE FROM watchlist WHERE user_id = ? AND movie_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $movie_id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "Failed to remove movie from watchlist"]);
    }

    $stmt->close();
    $conn->close();
}
?>
