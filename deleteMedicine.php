<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Delete Medicine Record</title>
</head>
<body>
<div class="container">
        <?php
            include("includes/header.php");

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "medicine_supply_database";

            $conn = new mysqli("localhost", "root", "", "medicine_supply_database");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['delete'])) {

                $stmt = $conn->prepare("DELETE FROM Medicine WHERE medicine_id = ?");
                $stmt->bind_param('i', $_POST['mid']);
                $stmt->execute();
                $stmt->close();
            
                header("Location: medicine-records.php?deleted=true");
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
        <main>
        <h2>Delete Medicine <?php echo $_GET['mid'];?></h2><br>
        <h3 style="color: red;">Are you sure want to delete this medicine record?</h3><br>

                <label style="font-size: 20px; color:blue; font-weight: bold;">Name</label>

                <label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label>

                <label style="font-size: 20px; color:blue; font-weight: bold;">Type</label>

                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>

                <label style="font-size: 20px; color:blue; font-weight: bold;">Quantity</label>

                <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>

                <label style="font-size: 20px; color:blue; font-weight: bold;">Unit</label>

                <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>

                <form method="post">
                     <input type="hidden" name="mid" value = "<?php echo $_GET['mid'] ?>"><br>
                    <input type="submit" value="Delete" name="delete"><a href="medicine-records.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>