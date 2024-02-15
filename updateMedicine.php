<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Update Medicine</title>
</head>
<body>
    <div class="container">
    <?php
        include("includes/header.php");
        
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "medicine_supply_database";

            $conn = new mysqli("localhost", "root", "", "medicine_supply_database");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['submit'])) {

                $sql = "UPDATE Medicine SET medicine_name = ?, type = ?, quantity_in_stock = ?, unit = ? WHERE medicine_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('ssdsi', $_POST['medname'], $_POST['type'], $_POST['quantity'], $_POST['unit'], $_GET['mid']);
                
                $stmt->execute();
                
                $stmt->close();
                
                header('Location: medicine-records.php');
                exit();
            }

            $sql = "SELECT * FROM Medicine WHERE medicine_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_GET['mid']);

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
            <h1>Update Medicine</h1>
            <form method="post">

                <label>Medicine Name</label>
                <input type="text" name="medname" value="<?php echo $arrayResult[0]['medicine_name']; ?>">
                
                <label>Type</label>
                <input type="text" name="type" value="<?php echo $arrayResult[0]['type']; ?>">

                <label>Quantity in Stock</label>
                <input type="number" name="quantity" value="<?php echo $arrayResult[0]['quantity_in_stock']; ?>">
                
                <label>Unit</label>
                <input type="text" name="unit" value="<?php echo $arrayResult[0]['unit']; ?>">

                <input type="submit" name="submit" value="Update"><a href="medicine-records.php" style="font-weight: bold; padding-left: 30px;">Back</a>
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>