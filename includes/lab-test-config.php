<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lab_database');

$mysqli = new mysqli("localhost", "root", "", "lab_database");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>