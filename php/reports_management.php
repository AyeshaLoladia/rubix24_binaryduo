<?php
// Continued from the previous script

// Assume that report_id is sent in the request parameters
$report_id = $_GET['report_id'];

// Fetch report details for a specific report
$stmt = $conn->prepare("SELECT * FROM Reports WHERE report_id = ?");
$stmt->bind_param("i", $report_id);
$stmt->execute();
$result = $stmt->get_result();

$report_details = $result->fetch_assoc();

echo json_encode($report_details);

$stmt->close();
$conn->close();
?>
