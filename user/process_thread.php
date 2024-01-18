<?php
session_start();

// Check if the user is logged in. You can implement your authentication logic here.
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message.
    header("Location: login.php");
    exit();
}

// Include your database connection code.
include('db_connection.php');

// Get thread data from the form.
$title = $_POST['title'];
$content = $_POST['content'];
$user_id = $_SESSION['user_id']; // Get the user ID from the session.

// Validate user input (add more validation as needed).
if (empty($title) || empty($content)) {
    // Handle validation errors and redirect back to the form.
    header("Location: new_thread.php?error=Please fill in all fields");
    exit();
}

// Insert the new thread into the database.
$sql = "INSERT INTO threads (user_id, title, content, created_at) VALUES (?, ?, ?, NOW())";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([$user_id, $title, $content]);

if ($result) {
    // Redirect to the thread or forum page after successful insertion.
    header("Location: forum.php");
    exit();
} else {
    // Handle database error and redirect back to the form.
    header("Location: new_thread.php?error=Thread creation failed");
    exit();
}