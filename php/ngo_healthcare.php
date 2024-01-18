<?php
// Continued from the previous script

// Assume that healthcare_program_id is sent in the request parameters
$healthcare_program_id = $_GET['healthcare_program_id'];

// Fetch NGO healthcare program details for a specific program
$stmt = $conn->prepare("SELECT * FROM NGOHealthcarePrograms WHERE healthcare_program_id = ?");
$stmt->bind_param("i", $healthcare_program_id);
$stmt->execute();
$result = $stmt->get_result();

$ngo_healthcare_program_details = $result->fetch_assoc();

echo json_encode($ngo_healthcare_program_details);

$stmt->close();
$conn->close();
?>
