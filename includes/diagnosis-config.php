<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'diagnosis_database');

$mysqli = new mysqli("localhost", "root", "", "diagnosis_database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>