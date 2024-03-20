<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="../css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="../javascript/main.js" defer></script>
    <title>Patient Records</title>
</head>
<body>
    <div class="container">
        <?php
            include("../patient/viewPatientSql.php");

            $patients = getPatients();
            include("../includes/header.php");
        ?>
        <main>
            <button onclick="topFunction()" class="top-button" title="Go to top">Top</button>
            <h1>Patient Records</h1>

            <form action="../patient/createPatient.php">
                <input type="submit" value="Create New Patient" />
            </form>
            <form action="../patient/searchForPatient.php">
                <input type="submit" value="Search Records" />
            </form>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Patient ID</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Postcode</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patients as $patients): ?>
                            <tr>
                                <td><?php echo $patients['patient_id']; ?></td>
                                <td><?php echo $patients['first_name']; ?></td>
                                <td><?php echo $patients['surname']; ?></td>
                                <td><?php echo $patients['email']; ?></td>
                                <td><?php echo $patients['date_of_birth']; ?></td>
                                <td><?php echo $patients['address']; ?></td>
                                <td><?php echo $patients['city']; ?></td>
                                <td><?php echo $patients['postcode']; ?></td>
                                <td>
                                    <a href="../patient/updatePatient.php?pid=<?php echo $patients['patient_id']; ?>">Update</a> 
                                    <a href="../patient/deletePatient.php?pid=<?php echo $patients['patient_id']; ?>">Delete</a>
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
