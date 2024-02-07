<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Update Staff User</title>
</head>
<body>
    <div class="container">
        <?php
        include("includes/header.php");
        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "staff_database";

            $conn = new mysqli("localhost", "root", "", "staff_database");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['submit'])) {

                $sql = "UPDATE Staff SET first_name = ?, surname = ?, email = ?, username = ?, date_of_birth = ?, job_role = ?, hire_date = ?, department_name = ?, salary = ? WHERE staff_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssssdi", $_POST['fname'], $_POST['surname'], $_POST['email'], $_POST['username'], $_POST['dob'], $_POST['job'], $_POST['hdate'], $_POST['department'], $_POST['salary'], $_GET['sid']);
                
                $stmt->execute();
                
                $stmt->close();
                
                header('Location: staff-records.php');
                exit();
            }

            $sql = "SELECT * FROM Staff WHERE staff_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_GET['sid']);

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
            <h1>Update Staff</h1>
            <form method="post">

                <label>First Name</label>
                <input type="text" name="fname" value="<?php echo $arrayResult[0]['first_name']; ?>">

                <label>Surname</label>
                <input type="text" name="surname" value="<?php echo $arrayResult[0]['surname']; ?>">

                <label>Email</label>
                <input type="text" name="email" value="<?php echo $arrayResult[0]['email']; ?>">

                <label>Username</label>
                <input type="text" name="username" value="<?php echo $arrayResult[0]['username']; ?>">

                <label>Job Role</label>
                <select name="job">
                    <option value="admin" <?php echo ($arrayResult[0]['job_role']=="admin") ? "selected" : ""; ?>>Admin</option>
                    <option value="doctor" <?php echo ($arrayResult[0]['job_role']=="doctor") ? "selected" : ""; ?>>Doctor</option>
                    <option value="pharmacist" <?php echo ($arrayResult[0]['job_role']=="pharmacist") ? "selected" : ""; ?>>Pharmacist</option>
                    <option value="lab technician" <?php echo ($arrayResult[0]['job_role']=="lab technician") ? "selected" : ""; ?>>Lab Technician</option>
                </select>

                <label>Hire Date</label>
                <input type="text" name="hdate" value="<?php echo $arrayResult[0]['hire_date']; ?>">

                <label>Department Name</label>
                <input type="text" name="department" value="<?php echo $arrayResult[0]['department_name']; ?>">

                
                <label>Annual Salary</label>
                <input type="text" name="salary" value="<?php echo $arrayResult[0]['salary']; ?>">

                <input type="submit" name="submit" value="Update"><br>
                <input type="submit" action="staff-records.php" value="Back" style="background-color: red;">
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>