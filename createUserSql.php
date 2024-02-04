<?php

function createUser(){
    $created = false;

    $db = new mysqli("localhost", "root", "", "staff_database");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $hashedPassword = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

    $sql = 'INSERT INTO staff(staff_id, first_name, surname, username, password, date_of_birth, job_role, hire_date, department_name, salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $db->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $db->error);
    }

    $stmt->bind_param('issssssssd', $_POST['sid'], $_POST['fname'], $_POST['surname'], $_POST['uname'], $_POST['pwd'], $_POST['dob'], $_POST['job'], $_POST['hdate'], $_POST['department'], $_POST['salary']);

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: createUserSuccess.php");
        exit();
    } else {
        die("Error in execute statement: " . $stmt->error);
    }

    $stmt->close();
    $db->close();

    return $created;
}
