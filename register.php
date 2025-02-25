<?php
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $conn = (new Dbh())->connect();

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'user')");

    if ($stmt === false) {
        die("Error preparing the statement: " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<html>
<head>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="log.css">
</head>
<body>
<header class="header">
    <a href="#" class="logo">Docuphile</a>
    <nav class="nav-items">
        <a href="index.php">Home</a>
        <a href="discover.html">Discover</a>
        <a href="watchlist.html">Watchlist</a>
        <a href="contact.html">Contact</a>
        <a href="register.php">Account</a>
    </nav>
</header>

<div class="form-container">
    <form action="#" method="POST" class="user-form">
        <h2>Register</h2>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your username" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <a href="login.php">Already have an account?<u> Login</u></a>
        <button type="submit" class="submit-btn">Register</button>
    </form>
</div>
</body>
</html>
