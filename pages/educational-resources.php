<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educational Resources - FoodFusion</title>
    <link rel="stylesheet" href="../css/educational-resources.css?v=<?=time();?>">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo">FoodFusion</div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="recipe-collection.php">Recipes</a></li>
            <li><a href="community-cookbook.php">Community</a></li>
            <li><a href="educational-resources.php" class="active">Educational</a></li>
            <li><a href="../api/logout.php" class="btn-logout">Logout</a></li>
        </ul>
        <div class="burger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>
</header>

<main class="resources-main">
    <h1>Educational Resources on Cooking</h1>

    <section class="resource-section">
        <h2>1. The Science of Cooking</h2>
        <p>Cooking is not just an art; it’s a science. Understanding the chemical reactions that happen when ingredients are heated, mixed, or fermented can elevate your culinary skills. Proteins denature, starches gelatinize, and sugars caramelize—all contributing to texture, flavor, and aroma. By learning the science behind techniques, cooks can manipulate results consistently and creatively. Techniques like sous-vide, searing, or slow-cooking rely heavily on precise control over temperature and time.</p>
    </section>

    <section class="resource-section">
        <h2>2. Nutritional Awareness</h2>
        <p>Nutrition is at the heart of modern cooking. Knowing how vitamins, minerals, and macronutrients behave under heat and mixing can influence recipe design. For instance, overcooking vegetables may destroy sensitive nutrients, while certain cooking methods like steaming or roasting preserve them. Understanding caloric balance, protein sources, and micronutrient density helps cooks prepare meals that are both delicious and health-conscious. Proper nutritional planning can make cooking a tool for wellness rather than just indulgence.</p>
    </section>

    <section class="resource-section">
        <h2>3. Sustainable Cooking Practices</h2>
        <p>Sustainability is increasingly important in the culinary world. Using locally sourced ingredients reduces carbon footprint, while minimizing food waste through proper storage, portioning, and repurposing leftovers helps the environment. Renewable energy in cooking, like solar ovens or induction stoves, is gaining attention. Sustainable cooking also involves selecting seasonal produce and ethically sourced proteins. Chefs and home cooks alike can make a tangible impact on the planet with mindful ingredient choices and smart cooking methods.</p>
    </section>

    <section class="resource-section">
        <h2>4. Global Culinary Techniques</h2>
        <p>Exploring different cultures through cooking expands both flavor and technique. From Japanese umami-centric methods to French classic sauces, and from Indian spice layering to Mediterranean olive oil-based cooking, understanding global culinary techniques broadens a cook’s repertoire. It teaches adaptability and creativity, allowing the integration of diverse methods into everyday meals. Cooking is a language; learning international techniques is like learning new dialects, offering more expressive power in the kitchen.</p>
    </section>

    <section class="resource-section">
        <h2>5. Food Safety and Hygiene</h2>
        <p>Hygiene is critical in cooking. Proper handling, storage, and preparation prevent contamination and foodborne illnesses. Understanding temperature control, cross-contamination, and proper cleaning protocols is essential. Food safety also extends to kitchen tools and utensils. Following these practices not only protects health but also preserves flavors and textures. Clean, safe kitchens ensure every dish is as delicious as it is safe.</p>
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
