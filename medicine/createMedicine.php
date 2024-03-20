<?php
include_once("../medicine/createMedicineSql.php");
require_once('../includes/medicine-config.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errormid = $errormedname = $errortype = $errorquantity = $errorunit = "";
$allFields = true;

if (isset($_POST['submit'])){

    if ($_POST['mid']==""){
        $errormid = "Medicine ID is mandatory";
        $allFields = false;
    }
    if ($_POST['medname']==""){
        $errormedname = "Medicine Name is mandatory";
        $allFields = false;
    }
    if ($_POST['type']==""){
        $errortype = "Medicine Type is mandatory";
        $allFields = false;
    }
    if ($_POST['quantity']==""){
        $errorquantity = "Quantity in Stock is mandatory";
        $allFields = false;
    }
    if ($_POST['unit']==""){
        $errorunit = "Unit is mandatory";
        $allFields = false;
    }

    if($allFields == true)
    {
        $medicineID = $_POST['mid'];
        if (checkMedicineIdExists($medicineID, $conn)) {
            $errormid = "Medicine ID already exists";
        } else {
            $createMedicine = createMedicine();
        }
    }
}

function checkMedicineIdExists($mid, $conn) {
    $result = mysqli_query($conn, "SELECT * FROM medicine WHERE medicine_id = '$mid'");
    return mysqli_num_rows($result) > 0;
    return false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="../css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="../javascript/main.js" defer></script>
    <title>Create Medicine Record</title>
</head>
<body>
    <div class="container"> 
        <?php
            include("../includes/header.php");
        ?>  
        <main>
            <h1>Create Medicine Record</h1>
            <form method="post">
                <label>Medicine ID</label>
                <input type="number" name = "mid">
                <span class="blank-notify"><?php echo $errormid; ?></span>

                <label>Medicine Name</label>
                <input type="text" name = "medname">
                <span class="blank-notify"><?php echo $errormedname; ?></span>

                <label>Type</label>
                <input type="text" name = "type">
                <span class="blank-notify"><?php echo $errortype; ?></span>

                <label>Quantity in Stock</label>
                <input type="number" name = "quantity">
                <span class="blank-notify"><?php echo $errorquantity; ?></span>

                <label>Unit</label>
                <input type="text" name = "unit">
                <span class="blank-notify"><?php echo $errorunit; ?></span>

                <input type="submit" value="Create Medicine" name ="submit"><a href="../medicine/medicine-records.php" class="back-button">Back</a>
            </form>
        </main>
        <?php
            include("../includes/footer.php");
        ?>
    </div>
</body>
</html>