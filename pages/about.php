<?php
session_start();
// if logged in, don't allow About page
if (isset($_SESSION['user_email'])) {
    header("Location: recipe-collection.php");
    exit();
}
$images = glob("../images/*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us - FoodFusion</title>
<link rel="stylesheet" href="../css/about.css?v=<?=time();?>">
<script>
const images = <?php echo json_encode($images); ?>;
let i = 0;
let hero;

window.addEventListener("DOMContentLoaded", () => {
    hero = document.querySelector('.about-hero'); // ✅ fixed querySelector

    if (!hero || images.length === 0) return;

    function changeBackground() {
        hero.style.backgroundImage = 
            `linear-gradient(rgba(255,111,97,0.2), rgba(255,111,97,0.2)), url('${images[i]}')`;
        i = (i + 1) % images.length;
    }

    changeBackground();
    setInterval(changeBackground, 5000); // change every 5s
});
</script>
</head>
<body>
<header>
<nav class="navbar">
    <div class="logo">FoodFusion</div>
    <ul class="nav-links">
        <li><a href="../index.php">Home</a></li>
        <li><a href="about.php" class="active">About Us</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="login.html" class="btn-login">Login</a></li>
        <li><a href="register.html" class="btn-register">Register</a></li>
    </ul>
    <div class="burger">
        <div></div>
        <div></div>
        <div></div>
    </div>
</nav>
</header>

<main>
<section class="about-hero">
    <div class="about-hero-content">
        <h1>About FoodFusion</h1>
        <p>FoodFusion is a culinary platform dedicated to promoting home cooking and creativity. Our mission is to bring food lovers together, share recipes, and inspire each other.</p>
    </div>
</section>
</main>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-about">
            <h2>FoodFusion</h2>
            <p>Explore, share, and enjoy recipes from around the world. Join our community and make cooking fun!</p>
        </div>
        <div class="footer-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        <div class="footer-contact">
            <h3>Contact Us</h3>
            <p>Email: support@foodfusion.com</p>
            <p>Phone: +95 123 456 789</p>
            <div class="social-icons">
                <a href="#"><img src="../images/facebook.svg" alt="Facebook"></a>
                <a href="#"><img src="../images/twitter.svg" alt="Twitter"></a>
                <a href="#"><img src="../images/instagram.svg" alt="Instagram"></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 FoodFusion. All rights reserved.</p>
    </div>
</footer>

<script>
const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav-links');
burger.addEventListener('click', () => {
    nav.classList.toggle('nav-active');
    burger.classList.toggle('toggle');
});
</script>
</body>
</html>
