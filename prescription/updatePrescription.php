<?php
    require_once('../includes/patient-config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="../css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="../javascript/main.js" defer></script>
    <title>Update Prescription</title>
</head>
<body>
    <div class="container">
        <?php
        include("../includes/header.php");
        
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

            $errorpid = $errormid = $errorpresquantity = $errorissued = "";
            $allFields = true;

            if (isset($_POST['submit'])) {

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

                if ($allFields) {
                $sql = "UPDATE Prescriptions SET patient_id = ?, medicine_id = ?, prescription_quantity = ?, date_issued = ?, date_collected = ? WHERE prescription_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iiissi", $_POST['pid'], $_POST['mid'], $_POST['presquantity'], $_POST['issued'], $_POST['collected'], $_GET['presid']);
                $stmt->execute();
                $stmt->close();
                
                header('Location: ../prescription/prescriptions.php');
                exit();
            }
        }

            $sql = "SELECT * FROM Prescriptions WHERE prescription_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_GET['presid']);
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
            <h1>Update Prescription</h1>
            <form method="post">
                <label>Patient ID</label>
                <input type="number" name="pid" value="<?php echo $arrayResult[0]['patient_id']; ?>">
                <span class="blank-notify"><?php echo $errorpid; ?></span>

                <label>Medicine ID</label>
                <input type="number" name="mid" value="<?php echo $arrayResult[0]['medicine_id']; ?>">
                <span class="blank-notify"><?php echo $errormid; ?></span>

                <label>Prescription Quantity</label>
                <input type="number" name="presquantity" value="<?php echo $arrayResult[0]['prescription_quantity']; ?>">
                <span class="blank-notify"><?php echo $errorpresquantity; ?></span>

                <label>Date Issued</label>
                <input type="date" name="issued" value="<?php echo $arrayResult[0]['date_issued']; ?>">
                <span class="blank-notify"><?php echo $errorissued; ?></span>

                <label>Date Collected</label>
                <input type="date" name="collected" value="<?php echo $arrayResult[0]['date_collected']; ?>">

                <input type="submit" name="submit" value="Update"><a href="../prescription/prescriptions.php" class="back-button">Back</a>
            </form>
        </main>
        <?php
            include("../includes/footer.php");
        ?>
    </div>
</body>
</html>