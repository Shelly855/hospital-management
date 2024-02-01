<?php
$errorfname = $errorlname = $erroruname = $erroruid = $errorpwd = "";
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['sid']==""){
        $errorsid = "Staff ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['fname']==""){
        $errorfname = "First name is mandatory";
        $allFields = "no";
    }
    if ($_POST['surname']==null){
        $errorsurname = "Surname is mandatory";
        $allFields = "no";
    }
    if ($_POST['uname']==""){
        $erroruname = "Username is mandatory";
        $allFields = "no";
    }
    if ($_POST['pwd']==""){
        $errorpwd = "Default password is mandatory";
        $allFields = "no";
    }
    if ($_POST['dob']==""){
        $errordob = "Date of Birth is mandatory";
        $allFields = "no";
    }
    if ($_POST['hdate']==""){
        $errorhdate = "Hire Date is mandatory";
        $allFields = "no";
    }
    if ($_POST['dname']==""){
        $errordname = "Department Name is mandatory";
        $allFields = "no";
    }
    if ($_POST['salary']==""){
        $errorsalary = "Salary is mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $createUser = createUser();
        header('Location: userCreationSummary.php?createUser='.$createUser);
    }
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
        <main>
            <h1>Create Staff User</h1>
            <form method="post">
                        <label>Staff ID</label>
                        <input type="text" name = "sid">
                        <span class="text-danger"><?php echo $errorsid; ?></span>

                        <label>First Name</label>
                        <input type="text" name = "fname">
                        <span class="text-danger"><?php echo $errorfname; ?></span>

                        <label>Surname</label>
                        <input type="text" name = "surname">
                        <span class="text-danger"><?php echo $errorsurname; ?></span>

                        <label>Username</label>
                        <input type="text" name = "uname">
                        <span class="text-danger"><?php echo $erroruname; ?></span>

                        <label>Default Password</label>
                        <input type="password" name = "pwd">
                        <span class="text-danger"><?php echo $errorpwd; ?></span>

                        <label>Date Of Birth</label>
                        <input type="date" name = "dob">
                        <span class="text-danger"><?php echo $errordob; ?></span>

                        <label>Job Role</label>
                        <select name="job">
                            <option value="admin">Admin</option>
                            <option value="doctor">Doctor</option>
                            <option value="pharmacist">Pharmacist</option>
                            <option value="lab technician">Pharmacist</option>
                        </select>

                        <label>Hire Date</label>
                        <input type="date" name = "hdate">
                        <span class="text-danger"><?php echo $errorhdate; ?></span>

                        <label>Department Name</label>
                        <input type="text" name = "department">
                        <span class="text-danger"><?php echo $errordepartment; ?></span>

                        <label>Salary</label>
                        <input type="number" name="salary" step="0.01">
                        <span class="text-danger"><?php echo $errorsalary; ?></span>

                        <input type="submit" value="Create Staff User" name ="submit">
                </form>
        </main>
    </div>
</body>
</html>