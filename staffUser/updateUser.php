<?php
    require_once('../includes/staff-config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="../css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="../javascript/main.js" defer></script>
    <title>Update Staff User</title>
</head>
<body>
    <div class="container">
        <?php
        include("../includes/header.php");
        
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

            $errorfname = $errorsurname = $erroremail = $erroruname = $errordob = $errorhdate = $errordepartment = $errorsalary = "";
            $allFields = true;

            if (isset($_POST['submit'])) {

                if ($_POST['fname']==""){
                    $errorfname = "First name is mandatory";
                    $allFields = false;
                }
                if ($_POST['surname']==""){
                    $errorsurname = "Surname is mandatory";
                    $allFields = false;
                }
                if ($_POST['email']==""){
                    $erroremail = "Email Address is mandatory";
                    $allFields = false;
                }
                if ($_POST['uname']==""){
                    $erroruname = "Username is mandatory";
                    $allFields = false;
                }
                if ($_POST['dob']==""){
                    $errordob = "Date of Birth is mandatory";
                    $allFields = false;
                }
                if ($_POST['hdate']==""){
                    $errorhdate = "Hire Date is mandatory";
                    $allFields = false;
                }
                if ($_POST['department']==""){
                    $errordepartment = "Department Name is mandatory";
                    $allFields = false;
                }
                if ($_POST['salary']==""){
                    $errorsalary = "Salary is mandatory";
                    $allFields = false;
                }

                if ($allFields) {
                $sql = "UPDATE Staff SET first_name = ?, surname = ?, email = ?, username = ?, date_of_birth = ?, job_role = ?, hire_date = ?, department_name = ?, salary = ? WHERE staff_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssssdi", $_POST['fname'], $_POST['surname'], $_POST['email'], $_POST['uname'], $_POST['dob'], $_POST['job'], $_POST['hdate'], $_POST['department'], $_POST['salary'], $_GET['sid']);
                $stmt->execute();     
                $stmt->close();
                
                header('Location: ../staffUser/staff-records.php');
                exit();
            }
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
                <span class="blank-notify"><?php echo $errorfname; ?></span>

                <label>Surname</label>
                <input type="text" name="surname" value="<?php echo $arrayResult[0]['surname']; ?>">
                <span class="blank-notify"><?php echo $errorsurname; ?></span>

                <label>Email</label>
                <input type="text" name="email" value="<?php echo $arrayResult[0]['email']; ?>">
                <span class="blank-notify"><?php echo $erroremail; ?></span>

                <label>Username</label>
                <input type="text" name="uname" value="<?php echo $arrayResult[0]['username']; ?>">
                <span class="blank-notify"><?php echo $erroruname; ?></span>

                <label>Date of Birth</label>
                <input type="date" name="dob" value="<?php echo $arrayResult[0]['date_of_birth']; ?>">
                <span class="blank-notify"><?php echo $errordob; ?></span>

                <label>Job Role</label>
                <select name="job">
                    <option value="admin" <?php echo ($arrayResult[0]['job_role']=="admin") ? "selected" : ""; ?>>Admin</option>
                    <option value="doctor" <?php echo ($arrayResult[0]['job_role']=="doctor") ? "selected" : ""; ?>>Doctor</option>
                    <option value="pharmacist" <?php echo ($arrayResult[0]['job_role']=="pharmacist") ? "selected" : ""; ?>>Pharmacist</option>
                    <option value="lab technician" <?php echo ($arrayResult[0]['job_role']=="lab technician") ? "selected" : ""; ?>>Lab Technician</option>
                </select>

                <label>Hire Date</label>
                <input type="date" name="hdate" value="<?php echo $arrayResult[0]['hire_date']; ?>">
                <span class="blank-notify"><?php echo $errorhdate; ?></span>

                <label>Department Name</label>
                <input type="text" name="department" value="<?php echo $arrayResult[0]['department_name']; ?>">
                <span class="blank-notify"><?php echo $errordepartment; ?></span>

                <label>Annual Salary</label>
                <input type="number" name="salary" value="<?php echo $arrayResult[0]['salary']; ?>">
                <span class="blank-notify"><?php echo $errorsalary; ?></span>

                <input type="submit" name="submit" value="Update"><a href="../staffUser/staff-records.php" class="back-button">Back</a>
            </form>
        </main>
        <?php
            include("../includes/footer.php");
        ?>
    </div>
</body>
</html>