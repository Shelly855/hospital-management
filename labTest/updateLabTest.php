<?php
    require_once('../includes/lab-test-config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="../css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="../javascript/main.js" defer></script>
    <title>Update Lab Test</title>
</head>
<body>
    <div class="container">
        <?php
        include("../includes/header.php");

        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

            $errorpid = $errortname = $errorreqdate = "";
            $allFields = true;
            
            if (isset($_POST['submit'])) {

                if ($_POST['pid'] == "") {
                    $errorpid = "Patient ID is mandatory";
                    $allFields = false;
                }
                if ($_POST['tname'] == "") {
                    $errortname = "Test Name is mandatory";
                    $allFields = false;
                }
                if ($_POST['reqdate'] == "") {
                    $errorreqdate = "Date Requested is mandatory";
                    $allFields = false;
                }
            
                if ($allFields) {
                    $sql = "UPDATE Lab_Tests SET patient_id = ?, lab_test_name = ?, date_requested = ?, date_completed = ?, result = ?, notes = ? WHERE lab_test_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("isssssi", $_POST['pid'], $_POST['tname'], $_POST['reqdate'], $_POST['cdate'], $_POST['result'], $_POST['lnotes'], $_GET['lid']);
                    $stmt->execute();
                    $stmt->close();
                    
                    header('Location: ../labTest/lab-tests.php');
                    exit();
                }
            }
                
            $sql = "SELECT * FROM Lab_Tests WHERE lab_test_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_GET['lid']);
            $stmt->execute();
            $result = $stmt->get_result();
            $arrayResult = [];
            
            while ($row = $result->fetch_assoc()) {
                $arrayResult[] = $row;
            }

            $stmt->close();
            $conn->close();

        ?>
        <main>
            <h1>Update Lab Test</h1>
            <form method="post">
                <label>Patient ID</label>
                <input type="number" name="pid" value="<?php echo $arrayResult[0]['patient_id']; ?>">
                <span class="blank-notify"><?php echo $errorpid; ?></span>

                <label>Test Name</label>
                <input type="text" name="tname" value="<?php echo $arrayResult[0]['lab_test_name']; ?>">
                <span class="blank-notify"><?php echo $errortname; ?></span>

                <label>Date Requested</label>
                <input type="date" name="reqdate" value="<?php echo $arrayResult[0]['date_requested']; ?>">
                <span class="blank-notify"><?php echo $errorreqdate; ?></span>

                <label>Date Completed</label>
                <input type="date" name="cdate" value="<?php echo $arrayResult[0]['date_completed']; ?>">

                <label>Result</label>
                <input type="text" name="result" value="<?php echo $arrayResult[0]['result']; ?>">

                <label>Notes</label>
                <input type="text" name="lnotes" value="<?php echo $arrayResult[0]['notes']; ?>">

                <input type="submit" name="submit" value="Update"><a href="../labTest/lab-tests.php" class="back-button">Back</a>
            </form>
        </main>
        <?php
            include("../includes/footer.php");
        ?>
    </div>
</body>
</html>