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

    $stmt->bind_param('isssssss', $_POST['pid'], $_POST['pfname'], $_POST['psurname'], $_POST['pemail'], $_POST['pdob'], $_POST['address'], $_POST['city'], $_POST['postcode']);

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createPatientSuccess.php??createPatient=success");
        exit();
    } else {
        die("Error in execute statement: " . $stmt->error);
    }

    $stmt->close();
    $db->close();

    return $created;
}