<?php
session_start();
include 'dbconfig.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
    exit;
}

if (isset($_POST['movie_id']) && is_numeric($_POST['movie_id'])) {
    $user_id = $_SESSION['user_id'];  
    $movie_id = $_POST['movie_id'];  


    $conn = (new Dbh())->connect();

   
    $sql_check = "SELECT id FROM watchlist WHERE user_id = ? AND movie_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("ii", $user_id, $movie_id);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
     
        echo json_encode(['success' => false, 'error' => 'Movie is already in your watchlist']);
    } else {
      
        $sql = "INSERT INTO watchlist (user_id, movie_id) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $movie_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);  
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to add movie to watchlist']);
        }

        $stmt->close();
    }

    $stmt_check->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid movie ID']);
}
?>

