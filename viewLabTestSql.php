<?php

function getLabTests(){

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'lab_database';

    $conn = new mysqli("localhost", "root", "", "lab_database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT l.lab_test_id, l.lab_test_name, l.date_requested, l.date_completed, l.result, l.notes, CONCAT(pa.first_name, ' ', pa.surname) AS patient_name, pa.date_of_birth
            FROM Lab_Tests l
            INNER JOIN patient_database.patients pa ON l.patient_id = pa.patient_id";

    $result = $conn->query($sql);

    $labtests = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $labtests[] = $row;
        }
    }

    $conn->close();

    return $labtests;
}