<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Prescriptions</title>
</head>
<body>
    <div class="container">
        <?php
            include("viewRecordsSql/viewPrescriptionSql.php");

            $prescriptions = getPrescriptions();
            include("includes/header.php");
        ?>
        <main>
            <button onclick="topFunction()" class="top-button" title="Go to top">Top</button>
            <h1>Prescriptions</h1>
            <form action="createPrescription.php">
                <input type="submit" value="Create New Prescription" />
            </form>
            <form action="searchForPrescription.php">
                <input type="submit" value="Search Records" />
            </form>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Prescription ID</th>
                            <th>Patient Name</th>
                            <th>DOB</th>
                            <th>Medicine Name</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Date Issued</th>
                            <th>Date Collected</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prescriptions as $prescription): ?>
                            <tr>
                                <td><?php echo $prescription['prescription_id']; ?></td>
                                <td><?php echo $prescription['patient_name']; ?></td>
                                <td><?php echo $prescription['date_of_birth']; ?></td>
                                <td><?php echo $prescription['medicine_name']; ?></td>
                                <td><?php echo $prescription['type']; ?></td>
                                <td><?php echo $prescription['prescription_quantity']; ?></td>
                                <td><?php echo $prescription['unit']; ?></td>
                                <td><?php echo $prescription['date_issued']; ?></td>
                                <td><?php echo $prescription['date_collected']; ?></td>
                                <td>
                                    <a href="updatePrescription.php?presid=<?php echo $prescription['prescription_id']; ?>">Update</a> 
                                    <a href="deletePrescription.php?presid=<?php echo $prescription['prescription_id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>   
            </div> 
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
    
</body>
</html>