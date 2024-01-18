<?php
// Continued from the previous script

// Assume that collaboration_id is sent in the request parameters
$collaboration_id = $_GET['collaboration_id'];

// Fetch NGO collaboration details for a specific collaboration
$stmt = $conn->prepare("SELECT * FROM NGOCollaborations WHERE collaboration_id = ?");
$stmt->bind_param("i", $collaboration_id);
$stmt->execute();
$result = $stmt->get_result();

$ngo_collaboration_details = $result->fetch_assoc();

echo json_encode($ngo_collaboration_details);

$stmt->close();
$conn->close();
?>
