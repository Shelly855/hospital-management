<?php
require_once("includes/patient-config.php");

$searchSurname = $_GET['surname'] ?? '';
$searchDOB = $_GET['date_of_birth'] ?? '';
$searchAddress = $_GET['address'] ?? '';

$conditions = [];
$parameters = [];

if (!empty($searchSurname)) {
    $conditions[] = "surname = ?";
    $parameters[] = $searchSurname;
}
if (!empty($searchDOB)) {
    $conditions[] = "date_of_birth = ?";
    $parameters[] = $searchDOB;
}
if (!empty($searchAddress)) {
    $conditions[] = "address LIKE ?";
    $parameters[] = "%$searchAddress%";
}

$sql = "SELECT * FROM patients";

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

