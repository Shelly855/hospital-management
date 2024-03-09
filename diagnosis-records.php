<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Diagnoses</title>
</head>
<body>
    <div class="container">
        <?php
            include("viewRecordsSql/viewDiagnosisSql.php");

            $diagnoses = getDiagnoses();
            include("includes/header.php");
        ?>
        <main>
            <h1>Diagnoses</h1>
            <form action="createDiagnosis.php">
                <input type="submit" value="Create New Diagnosis" />
            </form>
            <form action="searchForDiagnosis.php">
                <input type="submit" value="Search Records" />
            </form>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Diagnosis ID</th>
                            <th>Patient Name</th>
                            <th>DOB</th>
                            <th>Diagnosis Name</th>
                            <th>Diagnosis Date</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($diagnoses as $diagnosis): ?>
                            <tr>
                                <td><?php echo $diagnosis['diagnosis_id']; ?></td>
                                <td><?php echo $diagnosis['patient_name']; ?></td>
                                <td><?php echo $diagnosis['date_of_birth']; ?></td>
                                <td><?php echo $diagnosis['diagnosis_name']; ?></td>
                                <td><?php echo $diagnosis['diagnosis_date']; ?></td>
                                <td><?php echo $diagnosis['status']; ?></td>
                                <td><?php echo $diagnosis['notes']; ?></td>
                                <td>
                                    <a href="updateDiagnosis.php?did=<?php echo $diagnosis['diagnosis_id']; ?>">Update</a> 
                                    <a href="deleteDiagnosis.php?did=<?php echo $diagnosis['diagnosis_id']; ?>">Delete</a>
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