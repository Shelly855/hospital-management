<?php
include_once("createRecordSql/createUserSql.php");
$conn = mysqli_connect("localhost", "root", "", "staff_database");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$errorsid = $errorfname = $errorsurname = $erroremail = $erroruname = $errorpwd = $errordob = $errorjob = $errorhdate = $errordepartment = $errorsalary = "";
$allFields = true;

if (isset($_POST['submit'])){

    if ($_POST['sid']==""){
        $errorsid = "Staff ID is mandatory";
        $allFields = false;
    }
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
    if ($_POST['pwd']==""){
        $errorpwd = "Password is mandatory";
        $allFields = false;
    }
    if ($_POST['dob']==""){
        $errordob = "Date of Birth is mandatory";
        $allFields = false;
    }
    if ($_POST['job']==""){
        $errorjob = "Job Role is mandatory";
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

    if($allFields == true)
    {
        $hashedPassword = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $staffID = $_POST['sid'];
        if (checkStaffIdExists($staffID, $conn)) {
            $errorsid = "Staff ID already exists";
        } else {
            $createUser = createUser();
        }
    }
}

function checkStaffIdExists($sid, $conn) {
    $result = mysqli_query($conn, "SELECT * FROM staff WHERE staff_id = '$sid'");
    return mysqli_num_rows($result) > 0;
    return false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Create User</title>
</head>
<body>
    <div class="container">
        <?php
            include("includes/header.php");
        ?>  
        <main>
            <h1>Create Staff User</h1>
            <form method="post">
                <label>Staff ID</label>
                <input type="number" name = "sid">
                <span class="blank-notify"><?php echo $errorsid; ?></span>

                <label>First Name</label>
                <input type="text" name = "fname">
                <span class="blank-notify"><?php echo $errorfname; ?></span>

                <label>Surname</label>
                <input type="text" name = "surname">
                <span class="blank-notify"><?php echo $errorsurname; ?></span>

                <label>Email Address</label>
                <input type="text" name = "email">
                <span class="blank-notify"><?php echo $erroremail; ?></span>

                <label>Username</label>
                <input type="text" name = "uname">
                <span class="blank-notify"><?php echo $erroruname; ?></span>

                <label>Password</label>
                <input type="password" name = "pwd">
                <span class="blank-notify"><?php echo $errorpwd; ?></span>

                <label>Date Of Birth</label>
                <input type="date" name = "dob">
                <span class="blank-notify"><?php echo $errordob; ?></span>

                <label>Job Role</label>
                <select name="job">
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="pharmacist">Pharmacist</option>
                    <option value="lab technician">Lab Technician</option>
                </select>
                <span class="blank-notify"><?php echo $errorjob; ?></span>

                <label>Hire Date</label>
                <input type="date" name = "hdate">
                <span class="blank-notify"><?php echo $errorhdate; ?></span>

                <label>Department Name</label>
                <input type="text" name = "department">
                <span class="blank-notify"><?php echo $errordepartment; ?></span>

                <label>Annual Salary</label>
                <input type="number" name="salary" step="0.01">
                <span class="blank-notify"><?php echo $errorsalary; ?></span>

                <input type="submit" value="Create Staff User" name ="submit"><a href="staff-records.php" style="font-weight: bold; padding-left: 30px;">Back</a>
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>