<?php
session_start();

// Check if the user is logged in. You should implement your authentication logic here.
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or display an error message.
    header("Location: login.php");
    exit();
}

// Include your database connection code.
include_once("db_connection.php");

// Get post data from the form.
$content = $_POST['content'];
$user_id = $_SESSION['user_id']; // Get the user ID from the session.
$thread_id = $_POST['thread_id']; // Get the thread ID from the hidden field in the form.

// Validate user input (add more validation as needed).
if (empty($content)) {
    // Handle validation errors and redirect back to the form.
    header("Location: reply.php?thread_id=$thread_id&error=Please enter a valid reply");
    exit();
}

// Insert the new post into the database.
$sql = "INSERT INTO posts (thread_id, user_id, content, created_at) VALUES (?, ?, ?, NOW())";
$stmt = $pdo->prepare($sql);
$result = $stmt->execute([$thread_id, $user_id, $content]);

if ($result) {
    // Redirect to the thread page after successful post creation.
    header("Location: thread.php?thread_id=$thread_id");
    exit();
} else {
    // Handle database error and redirect back to the form.
    header("Location: reply.php?thread_id=$thread_id&error=Post creation failed");
    exit();
}