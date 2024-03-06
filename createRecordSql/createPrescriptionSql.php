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

    $stmt->bind_param('iiidss', $presid, $pid, $mid, $presquantity, $issued, $collected);

    $presid = (int)$_POST['presid'];
    $pid = (int)$_POST['pid'];
    $mid = (int)$_POST['mid'];
    $presquantity = (double)$_POST['presquantity'];
    $issued = $_POST['issued'];
    $collected = $_POST['collected'];

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createPrescriptionSuccess.php?createPrescription=success");
        exit();
    } else {
        error_log("Error in executing statement: " . $stmt->error);
        die("Error in creating prescription - try again later.");
    }
}