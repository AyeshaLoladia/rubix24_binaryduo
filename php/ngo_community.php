<?php
// Continued from the previous script

// Assume that development_id is sent in the request parameters
$development_id = $_GET['development_id'];

// Fetch NGO community development project details for a specific project
$stmt = $conn->prepare("SELECT * FROM NGOCommunityDevelopment WHERE development_id = ?");
$stmt->bind_param("i", $development_id);
$stmt->execute();
$result = $stmt->get_result();

$ngo_community_development_details = $result->fetch_assoc();

echo json_encode($ngo_community_development_details);

$stmt->close();
$conn->close();
?>
