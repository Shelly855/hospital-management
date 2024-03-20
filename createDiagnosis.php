<?php
include_once("createRecordSql/createDiagnosisSql.php");
$conn = mysqli_connect("localhost", "root", "", "diagnosis_database");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errordid = $errorpid = $errordname = $errorddate = $errorstatus = "";
$allFields = true;

if (isset($_POST['submit'])) {

    if ($_POST['did'] == "") {
        $errordid = "Diagnosis ID is mandatory";
        $allFields = false;
    }
    if ($_POST['pid'] == "") {
        $errorpid = "Patient ID is mandatory";
        $allFields = false;
    }
    if ($_POST['dname'] == "") {
        $errordname = "Diagnosis Name is mandatory";
        $allFields = false;
    }
    if ($_POST['ddate'] == "") {
        $errorddate = "Diagnosis Date is mandatory";
        $allFields = false;
    }
    if ($_POST['status'] == "") {
        $errorstatus = "Diagnosis Status is mandatory";
        $allFields = false;
    }

    if ($allFields && isset($_POST['dnotes'])) {
        $diagnosisID = $_POST['did'];
        if (checkDiagnosisIdExists($diagnosisID, $conn)) {
            $errordid = "Diagnosis ID already exists";
        } else {
            $createDiagnosis = createDiagnosis();
        }
    }
}

function checkDiagnosisIdExists($did, $conn) {
    $result = mysqli_query($conn, "SELECT * FROM diagnoses WHERE diagnosis_id = '$did'");
    return mysqli_num_rows($result) > 0;
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
    <title>Create Diagnosis</title>
</head>
<body>
    <div class="container"> 
        <?php
        include("includes/header.php");
        ?>  
        <main>
            <h1>Create Diagnosis</h1>
            <form method="post">
                <label>Diagnosis ID</label>
                <input type="number" name="did">
                <span class="blank-notify"><?php echo $errordid; ?></span>

                <label>Patient ID</label>
                <input type="number" name="pid">
                <span class="blank-notify"><?php echo $errorpid; ?></span>

                <label>Diagnosis Name</label>
                <input type="text" name="dname">
                <span class="blank-notify"><?php echo $errordname; ?></span>

                <label>Diagnosis Date</label>
                <input type="date" name="ddate">
                <span class="blank-notify"><?php echo $errorddate; ?></span>

                <label>Diagnosis Status</label>
                <select name="status">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="chronic">Chronic</option>
                    <option value="resolved">Resolved</option>
                </select>
                <span class="blank-notify"><?php echo $errorstatus; ?></span>

                <label>Notes</label>
                <input type="text" name="dnotes">
                <span class="blank-notify"></span>

                <input type="submit" name="submit" value="Create Diagnosis"><a href="diagnosis-records.php" class="back-button">Back</a>
            </form>
        </main>
        <?php
        include("includes/footer.php");
        ?>
    </div>
</body>
</html>
