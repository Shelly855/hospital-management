<?php
    session_start();

    require_once('includes/header-config.php');

    if (isset($_SESSION['role']) && isset($navigationLinks[$_SESSION['role']])) {
        $role = $_SESSION['role'];

        echo '<ul class="nav-menu">';
        foreach ($navigationLinks[$role] as $title => $link) {
            echo '<li><a href="' . $link . '">' . $title . '</a></li>';
        }
        echo '</ul>';
    } else {
        header("Location: login.php");
        exit(); 
    }
?>