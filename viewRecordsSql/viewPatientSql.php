<?php

function getPatients(){

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'patient_database';

    $conn = new mysqli("localhost", "root", "", "patient_database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Patients";
    $result = $conn->query($sql);

    $arrayResult = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $arrayResult[] = $row;
        }
    }

    $conn->close();

    return $arrayResult;
}