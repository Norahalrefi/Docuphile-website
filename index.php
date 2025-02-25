<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <header class="header">
        <a href="#" class="logo">Docuphile</a>

        <nav class="nav-items">
            <a href="index.php">Home</a>
            <a href="discover.html">Discover</a>
            <a href="watchlist.html">Watchlist</a>
            <a href="contact.html">Contact</a>

            <?php if (isset($_SESSION['user_id'])): ?>
        <form action="logout.php" method="POST">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    <?php else: ?>
        <a href="register.php">Account</a>
    <?php endif; ?>
    </header>

    <main>
        <div class="intro">
            <h1>Discover The World of Docs!</h1>
            <p>New platform to introduce unique genres of films to the world.</p>
            <button><a href="recipes.html" style="color:black;">Explore!</a></button>
        </div>

        <div class="about-me">
            <div class="about-me-text">
                <h2>Sign In!</h2>
                <p>To save and review your favorite films.</p>
            </div>
            <img src="https://i.pinimg.com/564x/70/f2/7b/70f27bc466acac45831fe0959e10c822.jpg" alt="me">
        </div>
        
        <div class="trend">
            <div class="trend-text">
                <h2>Trending Films!</h2>
            </div>
        </div>

        <ul class="cards">
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="https://upload.wikimedia.org/wikipedia/commons/a/af/Caspar_David_Friedrich_-_Wanderer_above_the_Sea_of_Fog.jpeg"></div>
                    <div class="card_content">
                        <h2 class="card_title">The Man of the Cliffs</h2>
                        <p class="card_text">2021 Society</p>
                        <button class="btn card_btn">Read More</button>
                    </div>
                </div>
            </li>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBaAkP0nlpl2uWipfjenwECyIm9KpDyDsdUA&s"></div>
                    <div class="card_content">
                        <h2 class="card_title">In the Mind of Plants</h2>
                        <p class="card_text">2008 Nature</p>
                        <button class="btn card_btn">Read More</button>
                    </div>
                </div>
            </li>
            <li class="cards_item">
                <div class="card">
                    <div class="card_image"><img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1477773381i/32807094.jpg"></div>
                    <div class="card_content">
                        <h2 class="card_title">The Magical Forest</h2>
                        <p class="card_text">2012 Nature</p>
                        <button class="btn card_btn">Read More</button>
                    </div>
                </div>
            </li>
        </ul>

    </main>

    <footer class="footer">
        <div class="copy">&copy; Docuphile</div>
        <div class="bottom-links">
            <div class="links">
                <span>More Info</span>
                <a href="index.html">Home</a>
                <a href="Discover.html">Discover</a>
                <a href="Watchlist.html">Watchlist</a>
                <a href="contact.html">Contact</a>
                <a href="register.php">Account</a>
            </div>
            <div class="links">
                <span>Social Links</span>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
