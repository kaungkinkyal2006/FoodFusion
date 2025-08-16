<?php
session_start();
// if logged in, redirect to recipes
if (isset($_SESSION['user_email'])) {
    header("Location: recipe-collection.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us - FoodFusion</title>
<link rel="stylesheet" href="../css/contact.css?v=<?=time();?>">
</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo">FoodFusion</div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php" class="active">Contact</a></li>
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
    <section class="contact-hero">
        <h1>Get in Touch with FoodFusion</h1>
        <p>We’d love to hear your questions, feedback, or suggestions. Fill out the form below or use our contact info!</p>
    </section>

    <section class="contact-container">
        <div class="contact-info">
            <div class="info-card">
                <h3>Email</h3>
                <p>support@foodfusion.com</p>
            </div>
            <div class="info-card">
                <h3>Phone</h3>
                <p>+95 123 456 789</p>
            </div>
            <div class="info-card">
    <h3>Follow Us</h3>
    <div class="social-icons">
        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
    </div>
</div>

        </div>

        <form class="contact-form" action="../api/contact.php" method="POST">
            <h2>Send Us a Message</h2>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="6" required></textarea>
            <button type="submit" class="btn-primary">Send Message</button>
        </form>
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
