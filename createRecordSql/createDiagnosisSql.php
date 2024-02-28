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

    $stmt->bind_param('iissss', $_POST['did'], $_POST['pid'], $_POST['dname'], $_POST['ddate'], $_POST['status'], $_POST['dnotes']);

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createDiagnosisSuccess.php?createDiagnosis=success");
        exit();
    } else {
        die("Error in execute statement: " . $stmt->error);
    }

    $stmt->close();
    $db->close();

    return $created;
}