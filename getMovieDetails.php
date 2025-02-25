<?php

if (isset($_GET['id'])) {
   
    $movieId = intval($_GET['id']);

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "movie_list";  
 
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
        exit;
    }

    $sql = "SELECT title, category, description, image FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
       
        echo json_encode(["error" => "SQL query preparation failed: " . $conn->error]);
        exit;
    }

    $stmt->bind_param("i", $movieId); 
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $movie = $result->fetch_assoc(); 
        echo json_encode($movie);  
    } else {
        echo json_encode(["error" => "Movie not found"]);
    }

    $stmt->close();  
    $conn->close();  
} else {
    echo json_encode(["error" => "Invalid request. Movie ID is missing"]);
}
?>
