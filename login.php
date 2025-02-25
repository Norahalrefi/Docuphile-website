<?php
session_start();
include 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = (new Dbh())->connect();
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            header("Location: index.php");
            exit;
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}
?>
<html>
<head>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
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
    <form action="" class="user-form" method="POST">
        <h2>Login</h2>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Enter email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required>

        <a href="#" id="pass">Forget your password?</a>
        <a href="register.php">Don't have an account? <u>Register here</u></a>

        <button type="submit" class="submit-btn">Log In</button>
    </form>
</div>

</body>
</html>
