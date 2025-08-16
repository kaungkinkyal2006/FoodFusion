<?php
session_start();
require '../api/db.php';

// Redirect if user is not logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: ../pages/login.html");
    exit;
}

// Get recipe ID from URL
if (!isset($_GET['id'])) {
    echo "No recipe specified.";
    exit;
}

$recipe_id = intval($_GET['id']);

// Fetch recipe from DB
$stmt = $conn->prepare("SELECT title, content, category, created_at, image FROM recipes WHERE id = ?");
$stmt->bind_param("i", $recipe_id);
$stmt->execute();
$stmt->bind_result($title, $content, $category, $created_at, $image);
if (!$stmt->fetch()) {
    echo "Recipe not found.";
    exit;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($title) ?> - FoodFusion</title>
<link rel="stylesheet" href="../css/recipe-detail.css?v=<?=time();?>">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo">FoodFusion</div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="recipe-collection.php">Recipes</a></li>
            <li><a href="community-cookbook.php">Community</a></li>
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
    <section class="recipe-detail">
        <div class="container">
            <?php if($image): ?>
            <img src="../images/<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($title) ?>" class="recipe-img">
            <?php endif; ?>
            <h1><?= htmlspecialchars($title) ?></h1>
            <p class="category"><strong>Category:</strong> <?= htmlspecialchars($category) ?></p>
            <p class="date"><strong>Posted on:</strong> <?= htmlspecialchars($created_at) ?></p>
            <div class="content">
                <?= nl2br(htmlspecialchars($content)) ?>
            </div>
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
                <li><a href="recipe-collection.php">Recipes</a></li>
                <li><a href="community-cookbook.php">Community</a></li>
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
