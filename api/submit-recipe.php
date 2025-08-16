<?php
session_start();
require 'db.php';

header('Content-Type: application/json');

// Check session
if (!isset($_SESSION['user_email'])) {
    echo json_encode(["success" => false, "message" => "Unauthorized: no email in session"]);
    exit;
}

$user_email = $_SESSION['user_email'];

// Get user_id
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
if (!$stmt) {
    echo json_encode(["success" => false, "message" => "Prepare failed: " . $conn->error]);
    exit;
}
$stmt->bind_param("s", $user_email);
$stmt->execute();
$stmt->bind_result($user_id);
$stmt->fetch();
$stmt->close();

if (!$user_id) {
    echo json_encode(["success" => false, "message" => "Unauthorized: user not found"]);
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category = isset($_POST['category']) ? trim($_POST['category']) : null;

    if (empty($title) || empty($content)) {
        echo json_encode(["success" => false, "message" => "Title and content are required"]);
        exit;
    }

    // Handle image upload
    $imageName = null;
    if (!empty($_FILES['image']['name'])) {
        if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(["success" => false, "message" => "Upload error code: " . $_FILES['image']['error']]);
            exit;
        }

        $targetDir = __DIR__ . "/../images/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowedExt = ["jpg", "jpeg", "png", "gif", "webp"];
        if (!in_array($ext, $allowedExt)) {
            echo json_encode(["success" => false, "message" => "Invalid image format"]);
            exit;
        }

        $imageName = time() . "_" . uniqid() . "." . $ext;
        $targetFile = $targetDir . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            echo json_encode([
                "success" => false,
                "message" => "Failed to upload image",
                "tmp" => $_FILES['image']['tmp_name'],
                "target" => $targetFile
            ]);
            exit;
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO recipes (user_id, title, content, category, image) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        echo json_encode(["success" => false, "message" => "Prepare failed: " . $conn->error]);
        exit;
    }
    $stmt->bind_param("issss", $user_id, $title, $content, $category, $imageName);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Recipe submitted successfully!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
}
?>
