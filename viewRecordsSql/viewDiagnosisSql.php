<?php
require_once('includes/diagnosis-config.php');

function getDiagnoses(){

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT d.diagnosis_id, d.diagnosis_name, d.diagnosis_date, d.status, d.notes, CONCAT(pa.first_name, ' ', pa.surname) AS patient_name, pa.date_of_birth
            FROM Diagnoses d
            INNER JOIN patient_database.Patients pa ON d.patient_id = pa.patient_id";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $diagnoses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $diagnoses[] = $row;
        }
    }

    $conn->close();

    return $diagnoses;
}