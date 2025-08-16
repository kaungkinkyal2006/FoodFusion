<?php
require 'db.php';

$result = $conn->query("SELECT id, user_id, title, content, category, created_at, image FROM recipes ORDER BY created_at DESC");

$recipes = [];
while ($row = $result->fetch_assoc()) {
    $recipes[] = $row;
}

header('Content-Type: application/json');
echo json_encode($recipes);
?>
