<?php
require_once('includes/lab-test-config.php');

function getLabTests(){

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT l.lab_test_id, l.lab_test_name, l.date_requested, l.date_completed, l.result, l.notes, CONCAT(pa.first_name, ' ', pa.surname) AS patient_name, pa.date_of_birth
            FROM Lab_Tests l
            INNER JOIN patient_database.patients pa ON l.patient_id = pa.patient_id";

    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $labtests = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $labtests[] = $row;
        }
    }

    $conn->close();

    return $labtests;
}