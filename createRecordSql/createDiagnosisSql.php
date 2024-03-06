<?php
require_once('includes/diagnosis-config.php');

function createDiagnosis(){
    $created = false;

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'INSERT INTO diagnoses(diagnosis_id, patient_id, diagnosis_name, diagnosis_date, status, notes) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
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