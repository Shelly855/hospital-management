<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Update Prescription</title>
</head>
<body>
    <div class="container">
        <?php
        include("includes/header.php");
        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "patient_database";

            $conn = new mysqli("localhost", "root", "", "patient_database");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['submit'])) {

                $sql = "UPDATE Prescriptions SET patient_id = ?, medicine_id = ?, prescription_quantity = ?, date_issued = ?, date_collected = ? WHERE prescription_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iiissi", $_POST['pid'], $_POST['mid'], $_POST['presquantity'], $_POST['issued'], $_POST['collected'], $_GET['presid']);
                
                $stmt->execute();
                
                $stmt->close();
                
                header('Location: prescriptions.php');
                exit();
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
                <input type="text" name="pid" value="<?php echo $arrayResult[0]['patient_id']; ?>">

                <label>Medicine ID</label>
                <input type="text" name="mid" value="<?php echo $arrayResult[0]['medicine_id']; ?>">

                <label>Prescription Quantity</label>
                <input type="text" name="presquantity" value="<?php echo $arrayResult[0]['prescription_quantity']; ?>">

                <label>Date Issued</label>
                <input type="date" name="issued" value="<?php echo $arrayResult[0]['date_issued']; ?>">

                <label>Date Collected</label>
                <input type="text" name="collected" value="<?php echo $arrayResult[0]['date_collected']; ?>">

                <input type="submit" name="submit" value="Update"><a href="prescriptions.php" style="font-weight: bold; padding-left: 30px;">Back</a>
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>