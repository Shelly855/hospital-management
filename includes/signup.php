<?php
define("DB_SERVER", "127.0.0.1");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "login_database");

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($mysqli->connect_error) {
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$first_name = $_POST['first-name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, surname, email, password) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("Error in statement preparation: " . $mysqli->error);
}

$stmt->bind_param("ssss", $first_name, $surname, $email, $password);

if ($stmt->execute()) {
    echo "<p>Signup Successful.</p>";
} else {
    echo "<p>Signup Unsuccessful.</p>";
}

$stmt->close();
$mysqli->close();
?>

 <!-- needs changing -->