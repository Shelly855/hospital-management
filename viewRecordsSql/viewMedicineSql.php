<?php

function getMedicine(){

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'medicine_supply_database';

    $conn = new mysqli("localhost", "root", "", "medicine_supply_database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM medicine";
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