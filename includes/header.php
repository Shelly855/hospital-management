<!-- <header>
            <nav>
                <ul>
                    <li><a href="homepage.php">Homepage</a></li>
                    <li><a href="patient-records.php">Patient Records</a></li>
                    <li><a href="staff-records.php">Staff Records</a></li>
                    <li><a href="medicine-records.php">Medicine Records</a></li>
                    <li><a href="prescriptions.php">Prescriptions</a></li>
                    <li><a href="diagnosis-records.php">Diagnosis Records</a></li>
                    <li><a href="login.php">Log Out</a></li>
                </ul>
            </nav>
        </header> -->

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