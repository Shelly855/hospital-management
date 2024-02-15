<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Medicine Records</title>
</head>
<body>
    <div class="container">
        <?php
            include("viewMedicineSql.php");

            $medicine = getMedicine();
            include("includes/header.php");
        ?>
        <main>
            <h1>Medicine Records</h1>
            <form action="createMedicine.php">
                <input type="submit" value="Create New Medicine" />
            </form>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Medicine ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i=0; $i<count($medicine); $i++):
                        ?>
                        <tr>
                            <td><?php echo $medicine[$i]['medicine_id']?></td>
                            <td><?php echo $medicine[$i]['medicine_name']?></td>
                            <td><?php echo $medicine[$i]['type']?></td>
                            <td><?php echo $medicine[$i]['quantity_in_stock']?></td>
                            <td><?php echo $medicine[$i]['unit']?></td>
                            <td><a href="updateMedicine.php?mid=<?php echo $medicine[$i]['medicine_id']; ?>">Update</a> <a href="deleteMedicine.php?mid=<?php echo $medicine[$i]['medicine_id']; ?>">Delete</a></td>
                        </tr>
                        <?php endfor;?>
                    </tbody>
                </table>   
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>