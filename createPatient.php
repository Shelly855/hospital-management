<?php
include_once("createRecordSql/createPatientSql.php");
$conn = mysqli_connect("localhost", "root", "", "patient_database");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorpid = $errorpfname = $errorpsurname = $errorpemail = $errorpdob = $erroraddress = $errorcity = $errorpostcode = "";
$allFields = true;

if (isset($_POST['submit'])){

    if ($_POST['pid']==""){
        $errorpid = "Patient ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['pfname']==""){
        $errorpfname = "First Name is mandatory";
        $allFields = "no";
    }
    if ($_POST['psurname']==""){
        $errorpsurname = "Surname is mandatory";
        $allFields = "no";
    }
    if ($_POST['pemail']==""){
        $errorpemail = "Email Address is mandatory";
        $allFields = "no";
    }
    if ($_POST['pdob']==""){
        $errorpdob = "Date of Birth is mandatory";
        $allFields = "no";
    }
    if ($_POST['address']==""){
        $erroraddress = "Address is mandatory";
        $allFields = "no";
    }
    if ($_POST['city']==""){
        $errorcity = "City is mandatory";
        $allFields = "no";
    }
    if ($_POST['postcode']==""){
        $errorpostcode = "Postcode is mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $patientID = $_POST['pid'];
        if (checkPatientIdExists($patientID, $conn)) {
            $errorpid = "Patient ID already exists";
        } else {
            $createPatient = createPatient();
        }
    }
}

function checkPatientIdExists($pid, $conn) {
    $result = mysqli_query($conn, "SELECT * FROM patients WHERE patient_id = '$pid'");
    return mysqli_num_rows($result) > 0;
    return false;
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
    <title>Create Patient Record</title>
</head>
<body>
    <div class="container"> 
        <?php
                include("includes/header.php");
        ?>  
        <main>
            <h1>Create Patient Record</h1>
            <form method="post">
                <label>Patient ID</label>
                <input type="number" name = "pid">
                <span class="blank-notify"><?php echo $errorpid; ?></span>

                <label>First Name</label>
                <input type="text" name = "pfname">
                <span class="blank-notify"><?php echo $errorpfname; ?></span>

                <label>Surname</label>
                <input type="text" name = "psurname">
                <span class="blank-notify"><?php echo $errorpsurname; ?></span>

                <label>Email Address</label>
                <input type="text" name = "pemail">
                <span class="blank-notify"><?php echo $errorpemail; ?></span>

                <label>Date of Birth</label>
                <input type="date" name = "pdob">
                <span class="blank-notify"><?php echo $errorpdob; ?></span>

                <label>Address</label>
                <input type="text" name = "address">
                <span class="blank-notify"><?php echo $erroraddress; ?></span>

                <label>City</label>
                <input type="text" name = "city">
                <span class="blank-notify"><?php echo $errorcity; ?></span>

                <label>Postcode</label>
                <input type="text" name = "postcode">
                <span class="blank-notify"><?php echo $errorpostcode; ?></span>

                <input type="submit" value="Create Patient" name ="submit"><a href="patient-records.php" style="font-weight: bold; padding-left: 30px;">Back</a>
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>