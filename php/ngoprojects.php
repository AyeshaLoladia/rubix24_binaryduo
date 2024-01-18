<?php
// Continued from the previous script

// Assume that ngo_project_id is sent in the request parameters
$ngo_project_id = $_GET['ngo_project_id'];

// Fetch NGO project details for a specific project
$stmt = $conn->prepare("SELECT * FROM NGOProjects WHERE ngo_project_id = ?");
$stmt->bind_param("i", $ngo_project_id);
$stmt->execute();
$result = $stmt->get_result();

$ngo_project_details = $result->fetch_assoc();

echo json_encode($ngo_project_details);

$stmt->close();
$conn->close();
?>
