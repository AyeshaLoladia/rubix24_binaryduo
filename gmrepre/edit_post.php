<?php
session_start();

// Check if the user is logged in.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include your database connection code.
include_once("db_connect.php");

// Get the post ID from the URL or form data.
$post_id = $_GET['post_id']; // You should validate this input.

// Query the database to fetch the post and its author.
$sql = "SELECT user_id, content FROM posts WHERE post_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$post_id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the user is the author of the post.
if ($_SESSION['user_id'] === $post['user_id']) {
    // User is the author, allow them to edit.

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission.
        $new_content = $_POST['new_content'];

        // Validate and sanitize user input.

        // Update the post in the database.
        $sql = "UPDATE posts SET content = ? WHERE post_id = ?";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$new_content, $post_id]);

        if ($result) {
            // Redirect to the post's view page after successful edit.
            header("Location: view_post.php?post_id=$post_id");
            exit();
        } else {
            // Handle database error.
            echo "Post edit failed.";
        }
    } else {
        // Display the edit form with the current content pre-filled.
        // Include an HTML form here with the post content.
    }
} else {
    // User is not the author, deny access.
    echo "You do not have permission to edit this post.";
}