<?php

function createPatient(){
    $created = false;

    $db = new mysqli("localhost", "root", "", "patient_database");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = 'INSERT INTO patients(patient_id, first_name, surname, email, date_of_birth, address, city, postcode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $db->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $db->error);
    }

    $stmt->bind_param('isssssss', $pid, $pfname, $psurname, $pemail, $pdob, $address, $city, $postcode);

    $pid = (int)$_POST['pid'];
    $pfname = $_POST['pfname'];
    $psurname = $_POST['psurname'];
    $pemail = $_POST['pemail'];
    $pdob = $_POST['pdob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postcode = $_POST['postcode'];

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createPatientSuccess.php?createPatient=success");
        exit();
    } else {
        error_log("Error in executing statement: " . $stmt->error);
        die("Error in creating patient record - try again later.");
    }
}