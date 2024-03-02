<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Update Diagnosis</title>
</head>
<body>
    <div class="container">
        <?php
        include("includes/header.php");
        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "diagnosis_database";

            $conn = new mysqli("localhost", "root", "", "diagnosis_database");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['submit'])) {

                $sql = "UPDATE Diagnoses SET patient_id = ?, diagnosis_name = ?, diagnosis_date = ?, status = ?, notes = ? WHERE diagnosis_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("issssi", $_POST['pid'], $_POST['dname'], $_POST['ddate'], $_POST['status'], $_POST['dnotes'], $_GET['did']);
                
                $stmt->execute();
                
                $stmt->close();
                
                header('Location: diagnosis-records.php');
                exit();
            }

            $sql = "SELECT * FROM Diagnoses WHERE diagnosis_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_GET['did']);

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
            <h1>Update Diagnosis</h1>
            <form method="post">

                <label>Patient ID</label>
                <input type="text" name="pid" value="<?php echo $arrayResult[0]['patient_id']; ?>">

                <label>Diagnosis Name</label>
                <input type="text" name="dname" value="<?php echo $arrayResult[0]['diagnosis_name']; ?>">

                <label>Diagnosis Date</label>
                <input type="date" name="ddate" value="<?php echo $arrayResult[0]['diagnosis_date']; ?>">

                <label>Diagnosis Status</label>
                <select name="status">
                    <option value="active" <?php echo ($arrayResult[0]['status']=="active") ? "selected" : ""; ?>>Active</option>
                    <option value="chronic" <?php echo ($arrayResult[0]['status']=="chronic") ? "selected" : ""; ?>>Chronic</option>
                    <option value="resolved" <?php echo ($arrayResult[0]['status']=="resolved") ? "selected" : ""; ?>>Resolved</option>
                </select>

                <label>Notes</label>
                <input type="text" name="dnotes" value="<?php echo $arrayResult[0]['notes']; ?>">

                <input type="submit" name="submit" value="Update"><a href="diagnosis-records.php" style="font-weight: bold; padding-left: 30px;">Back</a>
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>