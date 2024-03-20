<?php
require_once("../includes/lab-test-config.php");

$searchPatientID = $_GET['patient_id'] ?? '';
$searchLabTestName = $_GET['lab_test_name'] ?? '';

$conditions = [];
$parameters = [];

if (!empty($searchPatientID)) {
    $conditions[] = "patient_id LIKE ?";
    $parameters[] = "%$searchPatientID%";
}
if (!empty($searchLabTestName)) {
    $conditions[] = "lab_test_name LIKE ?";
    $parameters[] = "%$searchLabTestName%";
}

$sql = "SELECT * FROM lab_tests";

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

