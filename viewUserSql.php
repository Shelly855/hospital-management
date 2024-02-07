<?php

function getUsers(){

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'staff_database';

    $conn = new mysqli("localhost", "root", "", "staff_database");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Staff";
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

