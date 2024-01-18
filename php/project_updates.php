<?php
// Continued from the previous script

// Assume that project_id is sent in the request parameters
$project_id = $_GET['project_id'];

// Fetch project updates for a specific project
$stmt = $conn->prepare("SELECT * FROM ProjectUpdates WHERE project_id = ?");
$stmt->bind_param("i", $project_id);
$stmt->execute();
$result = $stmt->get_result();

$project_updates = array();
while ($row = $result->fetch_assoc()) {
    $project_updates[] = $row;
}

echo json_encode($project_updates);

$stmt->close();
$conn->close();
?>
