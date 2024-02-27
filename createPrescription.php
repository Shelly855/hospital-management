<?php
include_once("createPrescriptionSql.php");

$errorpresid = $errorpid = $errormid = $errorpresquantity = $errorissued = "";
$allFields = true;

if (isset($_POST['submit'])) {

    if ($_POST['presid']==""){
        $errorpresid = "Prescription ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['pid']==""){
        $errorpid = "Patient ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['mid']==""){
        $errormid = "Medicine ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['presquantity']==""){
        $errorpresquantity = "Quantity is mandatory";
        $allFields = "no";
    }
    if ($_POST['issued']==""){
        $errorissued = "Issued Date is mandatory";
        $allFields = "no";
    }
    if ($allFields == "yes" && isset($_POST['collected'])) {
        $createPrescription = createPrescription();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Create Prescription</title>
</head>
<body>
    <div class="container"> 
            <?php
                    include("includes/header.php");
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
                <span class="blank-notify"><?php echo $errorpid; ?></span>

                <label>Prescription Quantity</label>
                <input type="number" name = "presquantity">
                <span class="blank-notify"><?php echo $errorpresquantity; ?></span>

                <label>Date Issued</label>
                <input type="date" name = "issued">
                <span class="blank-notify"><?php echo $errorissued; ?></span>

                <label>Date Collected(when collected)</label>
                <input type="date" name = "collected">
                <span class="blank-notify"></span>

                <input type="submit" name="submit" value="Create Prescription"><a href="prescriptions.php" style="font-weight: bold; padding-left: 30px;">Back</a>
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>
