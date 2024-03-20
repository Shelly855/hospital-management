<?php
include_once("../prescription/createPrescriptionSql.php");
$conn = mysqli_connect("localhost", "root", "", "patient_database");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorpresid = $errorpid = $errormid = $errorpresquantity = $errorissued = "";
$allFields = true;

if (isset($_POST['submit'])) {

    if ($_POST['presid']==""){
        $errorpresid = "Prescription ID is mandatory";
        $allFields = false;
    }
    if ($_POST['pid']==""){
        $errorpid = "Patient ID is mandatory";
        $allFields = false;
    }
    if ($_POST['mid']==""){
        $errormid = "Medicine ID is mandatory";
        $allFields = false;
    }
    if ($_POST['presquantity']==""){
        $errorpresquantity = "Quantity is mandatory";
        $allFields = false;
    }
    if ($_POST['issued']==""){
        $errorissued = "Issued Date is mandatory";
        $allFields = false;
    }
    if ($allFields == true && isset($_POST['collected'])) {
        $prescriptionID = $_POST['presid'];
        if (checkPrescriptionIdExists($prescriptionID, $conn)) {
            $errorpresid = "Prescription ID already exists";
        } else {
            $createPrescription = createPrescription();
        }
    }
}

function checkPrescriptionIdExists($presid, $conn) {
    $result = mysqli_query($conn, "SELECT * FROM prescriptions WHERE prescription_id = '$presid'");
    return mysqli_num_rows($result) > 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="../css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="../javascript/main.js" defer></script>
    <title>Create Prescription</title>
</head>
<body>
    <div class="container"> 
            <?php
                include("../includes/header.php");
            ?>  
        <main>
            <h1>Create Prescription</h1>
            <form method="post">
                <label>Prescription ID</label>
                <input type="number" name = "presid">
                <span class="blank-notify"><?php echo $errorpresid; ?></span>

                <label>Patient ID</label>
                <input type="number" name = "pid">
                <span class="blank-notify"><?php echo $errorpid; ?></span>

                <label>Medicine ID</label>
                <input type="number" name = "mid">
                <span class="blank-notify"><?php echo $errormid; ?></span>

                <label>Prescription Quantity</label>
                <input type="number" name = "presquantity">
                <span class="blank-notify"><?php echo $errorpresquantity; ?></span>

                <label>Date Issued</label>
                <input type="date" name = "issued">
                <span class="blank-notify"><?php echo $errorissued; ?></span>

                <label>Date Collected(when collected)</label>
                <input type="date" name = "collected">
                <span class="blank-notify"></span>

                <input type="submit" name="submit" value="Create Prescription"><a href="../prescription/prescriptions.php" class="back-button">Back</a>
            </form>
        </main>
        <?php
            include("../includes/footer.php");
        ?>
    </div>
</body>
</html>
