<?php
require_once('../includes/medicine-config.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $stmt = $conn->prepare("DELETE FROM Medicine WHERE medicine_id = ?");
    $stmt->bind_param('i', $_POST['mid']);
    $stmt->execute();
    $stmt->close();

    header("Location: ../medicine/medicine-records.php?deleted=true");
    exit();
}

$sql = "SELECT medicine_name, type, quantity_in_stock, unit FROM Medicine WHERE medicine_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_GET['mid']);
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
    <link href="../css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="../css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="../javascript/main.js" defer></script>
    <title>Delete Medicine</title>
</head>
<body>
    <div class="container">
        <?php
            include("../includes/header.php");
        ?>  
        <main>
            <h2>Delete Medicine <?php echo $_GET['mid'];?></h2><br>
            <div class="confirm">Are you sure you want to delete this medicine record?</div>
            <div class="delete-data">
                    <label class="delete-label">Name</label>
                    <label><?php echo $arrayResult[0][0] ?></label>
            </div>
            <div class="delete-data">
                    <label class="delete-label">Type</label>
                    <label><?php echo $arrayResult[0][1] ?></label>
            </div>
            <div class="delete-data">
                    <label class="delete-label">Quantity</label>
                    <label><?php echo $arrayResult[0][2] ?></label>
            </div>
            <div class="delete-data">
                    <label class="delete-label">Unit</label>
                    <label><?php echo $arrayResult[0][3] ?></label>
            </div>
            <form method="post">
                <input type="hidden" name="mid" value = "<?php echo $_GET['mid'] ?>"><br>
                <input type="submit" value="Delete" name="delete"><a href="../medicine/medicine-records.php" class="back-button">Back</a>
            </form>
        </main>
        <?php
            include("../includes/footer.php");
        ?>
    </div>
</body>
</html>