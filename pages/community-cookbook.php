<?php
session_start();
require '../api/db.php';

// Redirect if user is not logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: ../pages/login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Cookbook - FoodFusion</title>
    <link rel="stylesheet" href="../css/community.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo">FoodFusion</div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="recipe-collection.php">Recipes</a></li>
            <li><a href="community-cookbook.php" class="active">Community</a></li>
            <li><a href="educational-resources.php">Educational</a></li>
            <li><a href="../api/logout.php" class="btn-logout">Logout</a></li>
        </ul>
        <div class="burger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>
</header>

<main>
    <section class="community-hero">
        <h1>Submit Your Recipe</h1>
        <p>Share your delicious recipes with our community!</p>
    </section>

    <section class="submit-recipe">
        <form id="recipeForm" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Recipe Title" required>
            <textarea name="content" placeholder="Ingredient" required></textarea>
            <input type="text" name="category" placeholder="Category">
            <input type="file" name="image" accept="image/*">
            <button type="submit" class="btn-primary">Submit Recipe</button>
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
                <li><a href="recipe-collection.php">Recipes</a></li>
                <li><a href="community-cookbook.php">Community</a></li>
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
// Burger menu
const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav-links');
burger.addEventListener('click', () => {
    nav.classList.toggle('nav-active');
    burger.classList.toggle('toggle');
});

// Submit recipe form with image upload
document.getElementById("recipeForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    let res = await fetch("../api/submit-recipe.php", {
        method: "POST",
        body: formData
    });

    let result = await res.text();
    alert(result);

    // Clear form after submit
    this.reset();
});
</script>
</body>
</html>
