<?php
require_once('includes/patient-config.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

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
        ?>  
        <main>
            <h2>Delete Patient <?php echo $_GET['pid'];?></h2><br>
            <div class="confirm">Are you sure you want to delete this patient?</div>
            <div class="delete-data">
                <label class="delete-label">First Name</label>
                <label><?php echo $arrayResult[0][0] ?></label>
            </div>
            <div class="delete-data">
                <label class="delete-label">Surname</label>
                <label><?php echo $arrayResult[0][1] ?></label>
            </div>
            <div class="delete-data">
                <label class="delete-label">Email</label>
                <label><?php echo $arrayResult[0][2] ?></label>
            </div>
            <div class="delete-data">
                <label class="delete-label">Date of Birth</label>
                <label><?php echo $arrayResult[0][3] ?></label>
            </div>
            <div class="delete-data">
                <label class="delete-label">Address</label>
                <label><?php echo $arrayResult[0][4] ?></label><br>
            </div>
            <form method="post">
                <input type="hidden" name="pid" value = "<?php echo $_GET['pid'] ?>"><br>
                <input type="submit" value="Delete" name="delete"><a href="patient-records.php" class="back-button">Back</a>
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>