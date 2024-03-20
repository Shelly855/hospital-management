<?php
require_once('includes/patient-config.php');

function getPrescriptions(){

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT p.prescription_id, p.prescription_quantity, p.date_issued, p.date_collected, CONCAT(pa.first_name, ' ', pa.surname) AS patient_name, pa.date_of_birth, m.medicine_name, m.type, m.unit
            FROM Prescriptions p
            INNER JOIN Patients pa ON p.patient_id = pa.patient_id
            INNER JOIN medicine_supply_database.Medicine m ON p.medicine_id = m.medicine_id";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $prescriptions = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $prescriptions[] = $row;
        }
    }

    $conn->close();

    return $prescriptions;
}