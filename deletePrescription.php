<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Delete Prescription</title>
</head>
<body>
<div class="container">
        <?php
            include("includes/header.php");

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "patient_database";

            $conn = new mysqli("localhost", "root", "", "patient_database");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['delete'])) {

                $stmt = $conn->prepare("DELETE FROM Prescriptions WHERE prescription_id = ?");
                $stmt->bind_param('i', $_POST['presid']);
                $stmt->execute();
                $stmt->close();
            
                header("Location: prescriptions.php?deleted=true");
                exit();
            }

            $sql = "SELECT patient_id, medicine_id, prescription_quantity, date_issued, date_collected FROM Prescriptions WHERE prescription_id=?";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $_GET['presid']);

            $stmt->execute();

            $result = $stmt->get_result();

            $arrayResult = [];

            while($row = $result->fetch_array(MYSQLI_NUM)) {
                $arrayResult[] = $row;
            }

            $stmt->close();
            $conn->close();
        ?>  
        <main>
        <h2>Delete Prescription <?php echo $_GET['presid'];?></h2><br>
        <div class="confirm">Are you sure want to delete this prescription?</div><br>
                <label class="delete-label">Patient ID</label>
                <label><?php echo $arrayResult[0][0] ?></label><br>
                <label class="delete-label">Medicine ID</label>
                <label><?php echo $arrayResult[0][1] ?></label><br>
                <label class="delete-label">Prescription Quantity</label>
                <label><?php echo $arrayResult[0][2] ?></label><br>
                <label class="delete-label">Date Issued</label>
                <label><?php echo $arrayResult[0][3] ?></label><br>
                <label class="delete-label">Date Collected</label>
                <label><?php echo $arrayResult[0][4] ?></label><br>
                <form method="post">
                     <input type="hidden" name="presid" value = "<?php echo $_GET['presid'] ?>"><br>
                    <input type="submit" value="Delete" name="delete"><a href="prescriptions.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>