<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="../css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="../javascript/main.js" defer></script>
    <title>Medicine Records</title>
</head>
<body>
    <div class="container">
        <?php
            include("../medicine/viewMedicineSql.php");

            $medicine = getMedicine();
            include("../includes/header.php");
        ?>
        <main>
            <button onclick="topFunction()" class="top-button" title="Go to top">Top</button>
            <h1>Medicine Records</h1>
            <form action="../medicine/createMedicine.php">
                <input type="submit" value="Create New Medicine" />
            </form>
            <form action="../medicine/searchForMedicine.php">
                <input type="submit" value="Search Records" />
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
                        <?php foreach ($medicine as $medicine): ?>
                            <tr>
                                <td><?php echo $medicine['medicine_id']; ?></td>
                                <td><?php echo $medicine['medicine_name']; ?></td>
                                <td><?php echo $medicine['type']; ?></td>
                                <td><?php echo $medicine['quantity_in_stock']; ?></td>
                                <td><?php echo $medicine['unit']; ?></td>
                                <td>
                                    <a href="../medicine/updateMedicine.php?mid=<?php echo $medicine['medicine_id']; ?>">Update</a> 
                                    <a href="../medicine/deleteMedicine.php?mid=<?php echo $medicine['medicine_id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>   
        </main>
        <?php
            include("../includes/footer.php");
        ?>
    </div>
</body>
</html>