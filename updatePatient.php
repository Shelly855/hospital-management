<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Update Patient</title>
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

                $sql = "UPDATE Patients SET first_name = ?, surname = ?, email = ?, date_of_birth = ?, address = ?, city = ?, postcode = ? WHERE patient_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssssssi", $_POST['pfname'], $_POST['psurname'], $_POST['pemail'], $_POST['pdob'], $_POST['address'], $_POST['city'], $_POST['postcode'], $_GET['pid']);
                
                $stmt->execute();
                
                $stmt->close();
                
                header('Location: patient-records.php');
                exit();
            }

            $sql = "SELECT * FROM Patients WHERE patient_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_GET['pid']);

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
            <h1>Update Patient</h1>
            <form method="post">

                <label>First Name</label>
                <input type="text" name="pfname" value="<?php echo $arrayResult[0]['first_name']; ?>">

                <label>Surname</label>
                <input type="text" name="psurname" value="<?php echo $arrayResult[0]['surname']; ?>">

                <label>Email</label>
                <input type="text" name="pemail" value="<?php echo $arrayResult[0]['email']; ?>">

                <label>Date of Birth</label>
                <input type="date" name="pdob" value="<?php echo $arrayResult[0]['date_of_birth']; ?>">

                <label>Address</label>
                <input type="text" name="address" value="<?php echo $arrayResult[0]['address']; ?>">

                <label>City</label>
                <input type="text" name="city" value="<?php echo $arrayResult[0]['city']; ?>">

                <label>Postcode</label>
                <input type="text" name="postcode" value="<?php echo $arrayResult[0]['postcode']; ?>">

                <input type="submit" name="submit" value="Update"><a href="patient-records.php" style="font-weight: bold; padding-left: 30px;">Back</a>
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>