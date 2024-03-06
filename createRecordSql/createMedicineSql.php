<?php
require_once('includes/medicine-config.php');

function createMedicine(){
    $created = false;

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'INSERT INTO medicine(medicine_id, medicine_name, type, quantity_in_stock, unit) VALUES (?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
    }

    $stmt->bind_param('issds', $mid, $medname, $type, $quantity, $unit);

    $mid = (int)$_POST['mid'];
    $medname = $_POST['medname'];
    $type = $_POST['type'];
    $quantity = (double)$_POST['quantity'];
    $unit = $_POST['unit'];

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createMedicineSuccess.php?createMedicine=success");
        exit();
    } else {
        error_log("Error in executing statement: " . $stmt->error);
        die("Error in creating medicine record - try again later.");
    }
}