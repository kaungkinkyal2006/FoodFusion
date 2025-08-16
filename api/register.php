<?php
session_start();
require 'db.php'; // adjust path if needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $email      = trim($_POST['email']);
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email already registered
        $stmt->close();
        echo "<script>alert('Email already registered!'); window.location.href='../pages/register.html';</script>";
        exit;
    }
    $stmt->close();

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

    if ($stmt->execute()) {
        // Set session
        $_SESSION['user_email'] = $email;

        // Redirect directly to root index.php
        header("Location: ../index.php");
        exit;
    } else {
        echo "<script>alert('Registration failed! Try again.'); window.location.href='../pages/register.html';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../pages/register.html");
    exit;
}
?>
