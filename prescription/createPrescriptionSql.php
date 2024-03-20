<?php
require_once('includes/patient-config.php');

function createPrescription(){
    $created = false;

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'INSERT INTO prescriptions(prescription_id, patient_id, medicine_id, prescription_quantity, date_issued, date_collected) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
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