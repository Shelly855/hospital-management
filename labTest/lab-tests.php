<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="../css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="../javascript/main.js" defer></script>
    <title>Lab Tests</title>
</head>
<body>
    <div class="container">
        <?php
            include("../labTest/viewLabTestSql.php");

            $labtests = getLabTests();
            include("../includes/header.php");
        ?>
        <main>
            <button onclick="topFunction()" class="top-button" title="Go to top">Top</button>
            <h1>Lab Tests</h1>
            <form action="../labTest/createLabTest.php">
                <input type="submit" value="Create New Lab Test" />
            </form>
            <form action="../labTest/searchForLabTest.php">
                <input type="submit" value="Search Records" />
            </form>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Lab Test ID</th>
                            <th>Patient Name</th>
                            <th>DOB</th>
                            <th>Test Name</th>
                            <th>Date Requested</th>
                            <th>Date Completed</th>
                            <th>Result</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($labtests as $labtest): ?>
                            <tr>
                                <td><?php echo $labtest['lab_test_id']; ?></td>
                                <td><?php echo $labtest['patient_name']; ?></td>
                                <td><?php echo $labtest['date_of_birth']; ?></td>
                                <td><?php echo $labtest['lab_test_name']; ?></td>
                                <td><?php echo $labtest['date_requested']; ?></td>
                                <td><?php echo $labtest['date_completed']; ?></td>
                                <td><?php echo $labtest['result']; ?></td>
                                <td><?php echo $labtest['notes']; ?></td>
                                <td>
                                    <a href="../labTest/updateLabTest.php?lid=<?php echo $labtest['lab_test_id']; ?>">Update</a> 
                                    <a href="../labTest/deleteLabTest.php?lid=<?php echo $labtest['lab_test_id']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>   
            </div> 
        </main>
        <?php
            include("../includes/footer.php");
        ?>
    </div>
</body>
</html>