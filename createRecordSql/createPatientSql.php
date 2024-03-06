<?php
require_once('includes/patient-config.php');

function createPatient(){
    $created = false;

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'INSERT INTO patients(patient_id, first_name, surname, email, date_of_birth, address, city, postcode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
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