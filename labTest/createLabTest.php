<?php
include_once("../labTest/createLabTestSql.php");
$conn = mysqli_connect("localhost", "root", "", "lab_database");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorlid = $errorpid = $errortname = $errorreqdate = "";
$allFields = true;

if (isset($_POST['submit'])) {

    if ($_POST['lid']==""){
        $errorlid = "Lab Test ID is mandatory";
        $allFields = false;
    }
    if ($_POST['pid']==""){
        $errorpid = "Patient ID is mandatory";
        $allFields = false;
    }
    if ($_POST['tname']==""){
        $errortname = "Test Name is mandatory";
        $allFields = false;
    }
    if ($_POST['reqdate']==""){
        $errorreqdate = "Date Requested is mandatory";
        $allFields = false;
    }
    if ($allFields == true && isset($_POST['cdate']) && isset($_POST['result']) && isset($_POST['lnotes'])) {
        $labTestID = $_POST['lid'];
        if (checkLabTestIdExists($labTestID, $conn)) {
            $errorlid = "Lab Test ID already exists";
        } else {
            $createLabTest = createLabTest();
        }
    }
}

function checkLabTestIdExists($lid, $conn) {
    $result = mysqli_query($conn, "SELECT * FROM lab_tests WHERE lab_test_id = '$lid'");
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
    <title>Create Lab Test</title>
</head>
<body>
    <div class="container"> 
            <?php
                include("../includes/header.php");
            ?>  
        <main>
            <h1>Create Lab Test</h1>
            <form method="post">
                <label>Lab Test ID</label>
                <input type="number" name = "lid">
                <span class="blank-notify"><?php echo $errorlid; ?></span>

                <label>Patient ID</label>
                <input type="number" name = "pid">
                <span class="blank-notify"><?php echo $errorpid; ?></span>

                <label>Test Name</label>
                <input type="text" name = "tname">
                <span class="blank-notify"><?php echo $errortname; ?></span>

                <label>Date Requested</label>
                <input type="date" name = "reqdate">
                <span class="blank-notify"><?php echo $errorreqdate; ?></span>

                <label>Date Completed(when completed)</label>
                <input type="date" name = "cdate">
                <span class="blank-notify"></span>

                <label>Result(when completed)</label>
                <input type="text" name = "result">
                <span class="blank-notify"></span>

                <label>Notes</label>
                <input type="text" name = "lnotes">
                <span class="blank-notify"></span>

                <input type="submit" name="submit" value="Create Lab Test"><a href="../labTest/lab-tests.php" class="back-button">Back</a>
            </form>
        </main>
        <?php
            include("../includes/footer.php");
        ?>
    </div>
</body>
</html>
