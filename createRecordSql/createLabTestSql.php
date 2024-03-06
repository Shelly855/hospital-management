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

    $stmt->bind_param('iisssss', $lid, $pid, $tname, $reqdate, $cdate, $result, $lnotes);

    $lid = (int)$_POST['lid'];
    $pid = (int)$_POST['pid'];
    $tname = $_POST['tname'];
    $reqdate = $_POST['reqdate'];
    $cdate = $_POST['cdate'];
    $result = $_POST['result'];
    $lnotes = $_POST['lnotes'];

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createLabTestSuccess.php?createLabTest=success");
        exit();
    } else {
        error_log("Error in executing statement: " . $stmt->error);
        die("Error in creating lab test - try again later.");
    }
}