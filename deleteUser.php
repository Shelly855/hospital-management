<?php
require_once('includes/staff-config.php');


$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $stmt = $conn->prepare("DELETE FROM Staff WHERE staff_id = ?");
    $stmt->bind_param('i', $_POST['sid']);
    $stmt->execute();
    $stmt->close();

    header("Location: staff-records.php?deleted=true");
    exit();
}

$sql = "SELECT first_name, surname, email, username, password, date_of_birth, job_role, hire_date, department_name, salary FROM Staff WHERE staff_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_GET['sid']);
$stmt->execute();
$result = $stmt->get_result();
$arrayResult = [];

while($row = $result->fetch_array(MYSQLI_NUM)) {
    $arrayResult[] = $row;
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Delete Staff User</title>
</head>
<body>
<div class="container">
        <?php
            include("includes/header.php");
        ?>  
        <main>
        <h2>Delete Staff User <?php echo $_GET['sid'];?></h2><br>
        <div class="confirm">Are you sure you want to delete this user?</div>
        <div class="delete-data">
                <label class="delete-label">First Name</label>
                <label><?php echo $arrayResult[0][0] ?></label>
        </div>
        <div class="delete-data">
                <label class="delete-label">Surname</label>
                <label><?php echo $arrayResult[0][1] ?></label>
        </div>
        <div class="delete-data">
                <label class="delete-label">Job Role</label>
                <label><?php echo $arrayResult[0][6] ?></label>
        </div>
        <form method="post">
            <input type="hidden" name="sid" value = "<?php echo $_GET['sid'] ?>"><br>
            <input type="submit" value="Delete" name="delete"><a href="staff-records.php" class="back-button">Back</a>
        </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>