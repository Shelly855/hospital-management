<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Delete Diagnosis</title>
</head>
<body>
<div class="container">
        <?php
            include("includes/header.php");

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "diagnosis_database";

            $conn = new mysqli("localhost", "root", "", "diagnosis_database");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['delete'])) {

                $stmt = $conn->prepare("DELETE FROM Diagnoses WHERE diagnosis_id = ?");
                $stmt->bind_param('i', $_POST['did']);
                $stmt->execute();
                $stmt->close();
            
                header("Location: diagnosis-records.php?deleted=true");
                exit();
            }

            $sql = "SELECT patient_id, diagnosis_name, diagnosis_date, status, notes FROM Diagnoses WHERE diagnosis_id=?";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $_GET['did']);

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
        <h2>Delete Diagnosis <?php echo $_GET['did'];?></h2><br>
        <div class="confirm">Are you sure want to delete this diagnosis record?</div><br>
                <label class="delete-label">Patient ID</label>
                <label><?php echo $arrayResult[0][0] ?></label><br>
                <label class="delete-label">Diagnosis Name</label>
                <label><?php echo $arrayResult[0][1] ?></label><br>
                <label class="delete-label">Diagnosis Date</label>
                <label><?php echo $arrayResult[0][2] ?></label><br> 
                <label class="delete-label">Diagnosis Status</label>
                <label><?php echo $arrayResult[0][3] ?></label><br>    
                <label class="delete-label">Notes</label>
                <label><?php echo $arrayResult[0][4] ?></label><br>
                <form method="post">
                     <input type="hidden" name="did" value = "<?php echo $_GET['did'] ?>"><br>
                    <input type="submit" value="Delete" name="delete"><a href="diagnosis-records.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>