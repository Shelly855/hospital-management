<?php

function getDiagnoses(){

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'diagnosis_database';

    $conn = new mysqli("localhost", "root", "", "diagnosis_database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT d.diagnosis_id, d.diagnosis_name, d.diagnosis_date, d.status, d.notes, CONCAT(pa.first_name, ' ', pa.surname) AS patient_name, pa.date_of_birth
            FROM Diagnoses d
            INNER JOIN patient_database.Patients pa ON d.patient_id = pa.patient_id";

    $result = $conn->query($sql);

    $diagnoses = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $diagnoses[] = $row;
        }
    }

    $conn->close();

    return $diagnoses;
}