<?php
require_once("includes/patient-config.php");

$searchPatientID = $_GET['patient_id'] ?? '';
$searchMedicineID = $_GET['medicine_id'] ?? '';

$conditions = [];
$parameters = [];

if (!empty($searchPatientID)) {
    $conditions[] = "patient_id LIKE ?";
    $parameters[] = "%" . $searchPatientID . "%";
}
if (!empty($searchMedicineID)) {
    $conditions[] = "medicine_id = ?";
    $parameters[] = $searchMedicineID;
}

$sql = "SELECT * FROM prescriptions";

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

