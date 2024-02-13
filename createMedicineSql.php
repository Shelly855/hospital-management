<?php

function createMedicine(){
    $created = false;

    $db = new mysqli("localhost", "root", "", "medicine_supply_database");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = 'INSERT INTO medicine(medicine_id, medicine_name, type, quantity_in_stock, unit) VALUES (?, ?, ?, ?, ?)';
    $stmt = $db->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $db->error);
    }

    $stmt->bind_param('isds', $_POST['mid'], $_POST['medname'], $_POST['type'], $_POST['quantity'], $_POST['unit']);

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createMedicineSuccess.php");
        exit();
    } else {
        die("Error in execute statement: " . $stmt->error);
    }

    $stmt->close();
    $db->close();

    return $created;
}