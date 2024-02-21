<?php

function createPrescription(){
    $created = false;

    $db = new mysqli("localhost", "root", "", "patient_database");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = 'INSERT INTO prescriptions(prescription_id, patient_id, medicine_id, prescription_quantity, date_issued, date_collected) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $db->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $db->error);
    }

    $stmt->bind_param('iiidss', $_POST['presid'], $_POST['pid'], $_POST['mid'], $_POST['presquantity'], $_POST['issued'], $_POST['collected']);

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createPrescriptionSuccess.php?createPrescription=success");
        exit();
    } else {
        die("Error in execute statement: " . $stmt->error);
    }

    $stmt->close();
    $db->close();

    return $created;
}