<?php

function createLabTest(){
    $created = false;

    $db = new mysqli("localhost", "root", "", "lab_database");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = 'INSERT INTO lab_tests(lab_test_id, patient_id, lab_test_name, date_requested, date_completed, result, notes) VALUES (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $db->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $db->error);
    }

    $stmt->bind_param('iisssss', $_POST['lid'], $_POST['pid'], $_POST['tname'], $_POST['reqdate'], $_POST['cdate'], $_POST['result'], $_POST['lnotes']);

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createLabTestSuccess.php?createLabTest=success");
        exit();
    } else {
        die("Error in execute statement: " . $stmt->error);
    }

    $stmt->close();
    $db->close();

    return $created;
}