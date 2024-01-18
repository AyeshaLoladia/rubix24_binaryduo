<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $content = $_POST['content'];
    $status = 'Open';

    $stmt = $conn->prepare("INSERT INTO Reports (user_id, content, status) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $content, $status);

    if ($stmt->execute()) {
        echo "Incident report submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
