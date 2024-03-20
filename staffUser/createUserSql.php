<?php
require_once('../includes/staff-config.php');

function createUser(){
    $created = false;

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = 'INSERT INTO staff(staff_id, first_name, surname, email, username, password, date_of_birth, job_role, hire_date, department_name, salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
    }

    $stmt->bind_param('isssssssssd', $sid, $fname, $surname, $email, $uname, $pwd, $dob, $job, $hdate, $department, $salary);

    $sid = (int)$_POST['sid'];
    $fname = $_POST['fname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $dob = $_POST['dob'];
    $job = $_POST['job'];
    $hdate = $_POST['hdate'];
    $department = $_POST['department'];
    $salary = (double)$_POST['salary'];

    $result = $stmt->execute();

    if($result){
        $created = true;
        header("Location: ../staffUser/createUserSuccess.php?createUser=success");
        exit();
    } else {
        error_log("Error in executing statement: " . $stmt->error);
        die("Error in creating staff user - please try again later.");
    }
}
