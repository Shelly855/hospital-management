<?php
require_once('includes/medicine-config.php');

function getMedicine(){

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM medicine";
    $result = $conn->query($sql);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $medicine = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $medicine[] = $row;
        }
    }

    $conn->close();

    return $medicine;
}