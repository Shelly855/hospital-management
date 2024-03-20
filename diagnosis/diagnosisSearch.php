<?php
require_once("../includes/diagnosis-config.php");

$searchPatientID = $_GET['patient_id'] ?? '';
$searchStatus = $_GET['status'] ?? '';

$conditions = [];
$parameters = [];

if (!empty($searchPatientID)) {
    $conditions[] = "patient_id = ?";
    $parameters[] = $searchPatientID;
}
if (!empty($searchStatus)) {
    $conditions[] = "status = ?";
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

    if ($result) {
        $searchResults = [];
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    } else {
        echo "Error in fetching results: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "Error in preparing SQL statement: " . $mysqli->error;
}

$mysqli->close();

