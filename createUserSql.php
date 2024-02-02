<?php

function createUser(){

    $created = false;
    $db = new SQLite3("C:\xampp\mysql\data\staff_database");
    $sql = 'INSERT INTO staff(staff_id, first_name, surname, username, date_of_birth, job_role, hire_date, department_name, salary) VALUES (:sid, :fname, :surname, :uname, :pwd, :dob, :job, :hdate, :department, salary)';
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':sID', $_POST['sid'], SQLITE3_TEXT);
    $stmt->bindParam(':fName', $_POST['fname'], SQLITE3_TEXT);
    $stmt->bindParam(':sName', $_POST['surname'], SQLITE3_TEXT);
    $stmt->bindParam(':uName', $_POST['uname'], SQLITE3_TEXT);
    $stmt->bindParam(':pwd', $_POST['pwd'], SQLITE3_TEXT);
    $stmt->bindParam(':DOB', $_POST['dob'], SQLITE3_TEXT);
    $stmt->bindParam(':job', $_POST['job'], SQLITE3_TEXT);
    $stmt->bindParam(':hDate', $_POST['hdate'], SQLITE3_TEXT);
    $stmt->bindParam(':department', $_POST['department'], SQLITE3_TEXT);
    $stmt->bindParam(':salary', $_POST['salary'], SQLITE3_REAL);

    $stmt->execute();

    if($stmt){
        $created = true;
    }

    return $created;
}