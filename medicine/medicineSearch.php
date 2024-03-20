<?php
require_once("../includes/medicine-config.php");

$searchMedicineID = $_GET['medicine_id'] ?? '';
$searchMedicineName = $_GET['medicine_name'] ?? '';

$conditions = [];
$parameters = [];

if (!empty($searchMedicineID)) {
    $conditions[] = "medicine_id = ?";
    $parameters[] = $searchMedicineID;
}
if (!empty($searchMedicineName)) {
    $conditions[] = "medicine_name LIKE ?";
    $parameters[] = "%$searchMedicineName%";
}

$sql = "SELECT * FROM medicine";

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
    error_log("Error in preparing SQL statement: " . $mysqli->error);
    echo "An error has occurred.";
}

$mysqli->close();

