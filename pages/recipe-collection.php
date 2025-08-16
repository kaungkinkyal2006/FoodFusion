<?php
session_start();
require '../api/db.php';

// Redirect if user is not logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: ../pages/login.html");
    exit;
}

// Get current user ID
$user_email = $_SESSION['user_email'];
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recipe Collection - FoodFusion</title>
<link rel="stylesheet" href="../css/recipes.css?v=<?=time();?>">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo">FoodFusion</div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="recipe-collection.php" class="active">Recipes</a></li>
            <li><a href="community-cookbook.php">Community</a></li>
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
    <section class="recipes-hero">
        <h1>Recipe Collection</h1>
        <p>Browse recipes from our community and manage your own creations.</p>
    </section>

    <section class="recipes-list" id="recipes">
        Loading recipes...
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
async function loadRecipes() {
    const res = await fetch('../api/get-recipes.php');
    const recipes = await res.json();
    const container = document.getElementById('recipes');
    container.innerHTML = '';

    recipes.forEach(r => {
        container.innerHTML += `
        <a href="recipe-detail.php?id=${r.id}" class="recipe-card-link">
            <div class="recipe-card" id="recipe-${r.id}">
                ${r.image ? `<img src="../images/${r.image}" class="recipe-img" alt="${r.title}">` : ''}
                <h3>${r.title}</h3>
            </div>
        </a>`;
    });
}

// Burger menu toggle
const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav-links');
burger.addEventListener('click', () => {
    nav.classList.toggle('nav-active');
    burger.classList.toggle('toggle');
});

window.onload = loadRecipes;
</script>
</body>
</html>
