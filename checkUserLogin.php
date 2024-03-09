<?php
require_once('includes/staff-config.php');

function verifyUsers () {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        return array();
    }

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return array();
    }

    $stmt = $conn->prepare('SELECT username, staff_id, first_name, job_role FROM Staff WHERE username=? AND password=?');
    $stmt->bind_param('ss', $_POST['username'], $_POST['password']);
    $stmt->execute();
    $stmt->bind_result($userName, $staffId, $firstName, $jobRole);

    $rows_array = array();
    while ($stmt->fetch()) {
        $row = array(
            'username' => $userName,
            'staff_id' => $staffId,
            'first_name' => $firstName,
            'Role' => $jobRole
        );
        $rows_array[] = $row;
    }

    $stmt->close();
    $conn->close();

    return $rows_array;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verifiedUsers = verifyUsers();

    if (!empty($verifiedUsers)) {
        $_SESSION['stfID'] = $verifiedUsers[0]['staff_id'];
        $_SESSION['role'] = $verifiedUsers[0]['Role'];
        header("Location: index.php");
        exit;
    } else {
        echo "<script>document.addEventListener('DOMContentLoaded', function() {
        var errorMessageElement = document.getElementById('error-message');
        if (errorMessageElement) {
            errorMessageElement.innerHTML = 'Invalid username or password. Please try again.';
        }
        });</script>";
    }
}
?>