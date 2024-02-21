<?php
include_once("createMedicineSql.php");

$errormid = $errormedname = $errortype = $errorquantity = $errorunit = "";
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['mid']==""){
        $errormid = "Medicine ID is mandatory";
        $allFields = "no";
    }
    if ($_POST['medname']==""){
        $errormedname = "Medicine Name is mandatory";
        $allFields = "no";
    }
    if ($_POST['type']==""){
        $errortype = "Medicine Type is mandatory";
        $allFields = "no";
    }
    if ($_POST['quantity']==""){
        $errorquantity = "Quantity in Stock is mandatory";
        $allFields = "no";
    }
    if ($_POST['unit']==""){
        $errorunit = "Unit is mandatory";
        $allFields = "no";
    }

    if($allFields == "yes")
    {
        $createMedicine = createMedicine();
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
    <title>Create Medicine Record</title>
</head>
<body>
    <div class="container"> 
        <?php
                include("includes/header.php");
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

                <input type="submit" value="Create Medicine" name ="submit"><a href="medicine-records.php" style="font-weight: bold; padding-left: 30px;">Back</a>
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>