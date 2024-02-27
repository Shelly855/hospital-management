<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Delete Lab Test</title>
</head>
<body>
<div class="container">
        <?php
            include("includes/header.php");

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "lab_database";

            $conn = new mysqli("localhost", "root", "", "lab_database");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['delete'])) {

                $stmt = $conn->prepare("DELETE FROM Lab_Tests WHERE lab_test_id = ?");
                $stmt->bind_param('i', $_POST['lid']);
                $stmt->execute();
                $stmt->close();
            
                header("Location: lab-tests.php?deleted=true");
                exit();
            }

            $sql = "SELECT patient_id, lab_test_name, date_requested, date_completed, result, notes FROM Lab_Tests WHERE lab_test_id=?";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $_GET['lid']);

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
        <h2>Delete Lab Test <?php echo $_GET['lid'];?></h2><br>
        <div class="confirm">Are you sure want to delete this lab test?</div><br>
                <label class="delete-label">Patient ID</label>
                <label><?php echo $arrayResult[0][0] ?></label><br>
                <label class="delete-label">Test Name</label>
                <label><?php echo $arrayResult[0][1] ?></label><br>
                <label class="delete-label">Date Requested</label>
                <label><?php echo $arrayResult[0][2] ?></label><br>
                <label class="delete-label">Date Completed</label>
                <label><?php echo $arrayResult[0][3] ?></label><br>
                <label class="delete-label">Result</label>
                <label><?php echo $arrayResult[0][4] ?></label><br>
                <label class="delete-label">Notes</label>
                <label><?php echo $arrayResult[0][5] ?></label><br>
                <form method="post">
                     <input type="hidden" name="lid" value = "<?php echo $_GET['lid'] ?>"><br>
                    <input type="submit" value="Delete" name="delete"><a href="lab-tests.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>