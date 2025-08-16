<?php
session_start();
// get all images from ../images folder
$images = glob("images/*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodFusion</title>
    <link rel="stylesheet" href="css/index.css?v=<?=time();?>">

    <script>
    // PHP will output your array of image paths
    const images = <?php echo json_encode($images); ?>;

    let i = 0;
    let hero; 

    window.addEventListener("DOMContentLoaded", () => {
        hero = document.querySelector('.hero');

        function changeBackground() {
            hero.style.backgroundImage = 
                `linear-gradient(rgba(255,111,97,0.2), rgba(255,111,97,0.2)), url('${images[i]}')`;
            i = (i + 1) % images.length;
        }

        changeBackground();
        setInterval(changeBackground, 4000);
    });
</script>


</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">FoodFusion</div>
            <ul class="nav-links">
                <?php if (isset($_SESSION['user_email'])): ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pages/recipe-collection.php">Recipes</a></li>
                    <li><a href="pages/community-cookbook.php">Community</a></li>
                    <li><a href="pages/educational-resources.php">Educational</a></li>
                    <li><a href="api/logout.php" class="btn-logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pages/about.php">About Us</a></li>
                    <li><a href="pages/contact.php">Contact</a></li>
                    <li><a href="pages/login.html" class="btn-login">Login</a></li>
                    <li><a href="pages/register.html" class="btn-register">Register</a></li>
                <?php endif; ?>
            </ul>
            <div class="burger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>
    </header>

    <main>
    
        <section class="hero">
  <div class="hero-content">
    <h1>Welcome to FoodFusion</h1>
    <p>Your hub for recipes and cooking tips!</p>
    <a href="pages/recipe-collection.php" class="btn-primary">Explore Recipes</a>
  </div>
</section>

    </main>

    <script>
        // Toggle mobile menu
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.nav-links');

        burger.addEventListener('click', () => {
            nav.classList.toggle('nav-active');
            burger.classList.toggle('toggle');
        });
    </script>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-about">
            <h2>FoodFusion</h2>
            <p>Explore, share, and enjoy recipes from around the world. Join our community and make cooking fun!</p>
        </div>

        <div class="footer-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="pages/about.php">About Us</a></li>
                <li><a href="pages/contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h3>Contact Us</h3>
            <p>Email: support@foodfusion.com</p>
            <p>Phone: +95 123 456 789</p>
            <div class="social-icons">
                <a href="#"><img src="images/facebook.svg" alt="Facebook"></a>
                <a href="#"><img src="images/twitter.svg" alt="Twitter"></a>
                <a href="#"><img src="images/instagram.svg" alt="Instagram"></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 FoodFusion. All rights reserved.</p>
    </div>
</footer>


</body>
</html>
