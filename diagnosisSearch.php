<?php
require_once("includes/diagnosis-config.php");

$searchPatientID = $_GET['patient_id'] ?? '';
$searchStatus = $_GET['status'] ?? '';

$conditions = [];
$parameters = [];

if (!empty($searchPatientID)) {
    $conditions[] = "patient_id LIKE ?";
    $parameters[] = "%" . $searchPatientID . "%";
}
if (!empty($searchStatus)) {
    $conditions[] = "status LIKE ?";
    $parameters[] = $searchStatus;
}

$sql = "SELECT * FROM diagnoses";

if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

$stmt = $mysqli->prepare($sql);

if ($stmt) {
    if (!empty($parameters)) {
        $types = str_repeat('s', count($parameters));
        $stmt->bind_param($types, ...$parameters);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $searchResults = [];
    while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
    }
    
    $stmt->close();
} else {
    echo "Error in preparing SQL statement: " . $mysqli->error;
}

$mysqli->close();
?>

