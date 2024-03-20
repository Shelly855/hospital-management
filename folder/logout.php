<?php 
    session_start();
    session_destroy();
    header('Location: ../folder/login.php');
    exit;
?>
