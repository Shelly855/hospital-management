<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Delete Patient</title>
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

                $stmt = $conn->prepare("DELETE FROM Patients WHERE patient_id = ?");
                $stmt->bind_param('i', $_POST['pid']);
                $stmt->execute();
                $stmt->close();
            
                header("Location: patient-records.php?deleted=true");
                exit();
            }

            $sql = "SELECT first_name, surname, email, date_of_birth, address, city, postcode FROM Patients WHERE patient_id=?";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $_GET['pid']);

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
        <h2>Delete Patient <?php echo $_GET['pid'];?></h2><br>
        <h3 style="color: red;">Are you sure want to delete this patient?</h3><br>

                <label style="font-size: 20px; color:blue; font-weight: bold;">First Name</label>

                <label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label>

                <label style="font-size: 20px; color:blue; font-weight: bold;">Surname</label>

                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>

                <label style="font-size: 20px; color:blue; font-weight: bold;">Email</label>

                <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
                
                <label style="font-size: 20px; color:blue; font-weight: bold;">Date of Birth</label>

                <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
                
                <label style="font-size: 20px; color:blue; font-weight: bold;">Address</label>

                <label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>

                <form method="post">
                     <input type="hidden" name="pid" value = "<?php echo $_GET['pid'] ?>"><br>
                    <input type="submit" value="Delete" name="delete"><a href="patient-records.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>