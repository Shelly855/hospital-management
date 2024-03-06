<?php

function createDiagnosis(){
    $created = false;

    $db = new mysqli("localhost", "root", "", "diagnosis_database");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = 'INSERT INTO diagnoses(diagnosis_id, patient_id, diagnosis_name, diagnosis_date, status, notes) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $db->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $db->error);
    }

    $stmt->bind_param('iissss', $did, $pid, $dname, $ddate, $status, $dnotes);

    $did = (int)$_POST['did'];
    $pid = (int)$_POST['pid'];
    $dname = $_POST['dname'];
    $ddate = $_POST['ddate'];
    $status = $_POST['status'];
    $dnotes = $_POST['dnotes'];

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createDiagnosisSuccess.php?createDiagnosis=success");
        exit();
    } else {
        error_log("Error in executing statement: " . $stmt->error);
        die("Error in creating diagnosis - try again later.");
    }
}