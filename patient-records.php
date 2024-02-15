<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Patient Records</title>
</head>
<body>
    <div class="container">
        <?php
            include("viewPatientSql.php");

            $patients = getPatients();
            include("includes/header.php");
        ?>
        <main>
            <h1>Patient Records</h1>

            <form action="createPatient.php">
                <input type="submit" value="Create New Patient" />
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
                        <?php
                            for ($i=0; $i<count($patients); $i++):
                        ?>
                        <tr>
                            <td><?php echo $patients[$i]['patient_id']?></td>
                            <td><?php echo $patients[$i]['first_name']?></td>
                            <td><?php echo $patients[$i]['surname']?></td>
                            <td><?php echo $patients[$i]['email']?></td>
                            <td><?php echo $patients[$i]['date_of_birth']?></td>
                            <td><?php echo $patients[$i]['address']?></td>
                            <td><?php echo $patients[$i]['city']?></td>
                            <td><?php echo $patients[$i]['postcode']?></td>
                            <td><a href="updatePatient.php?pid=<?php echo $patients[$i]['patient_id']; ?>">Update</a> <a href="deletePatient.php?pid=<?php echo $patients[$i]['patient_id']; ?>">Delete</a></td>
                        </tr>
                        <?php endfor;?>
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
