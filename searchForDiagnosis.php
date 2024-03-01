<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Search</title>
</head>
<body>
    <div class="container">
        <?php include("includes/header.php"); ?>  
        <main>
            <h1>Search For Diagnosis</h1>
            <form action="diagnosis-records.php">
                <input type="submit" value="Back" />
            </form>

            <div class="search-container">
                <form action="" method="GET">
                    <input type="number" class="search" name="patient_id" placeholder="Search by Patient ID">
                    <input type="text" class="search" name="status" placeholder="Search by Status">
                    <button id="search-button" type="submit">Search</button>
                </form>
            </div>

            <div class="table-container">
                <?php
                    if(isset($_GET['patient_id']) || isset($_GET['status'])) {
                        include("search/diagnosisSearch.php");
                    }
                    if (isset($searchResults) && !empty($searchResults)) {
                        echo "<table>";
                        echo "<tr>
                        <th>Diagnosis ID</th>
                        <th>Patient ID</th>
                        <th>Diagnosis Name</th>
                        <th>Diagnosis Date</th>
                        <th>Status</th>
                        <th>Notes</th>
                        </tr>";
                        foreach ($searchResults as $result) {
                            echo "<tr>";
                            echo "<td>" . $result['diagnosis_id'] . "</td>";
                            echo "<td>" . $result['patient_id'] . "</td>";
                            echo "<td>" . $result['diagnosis_name'] . "</td>";
                            echo "<td>" . $result['diagnosis_date'] . "</td>";
                            echo "<td>" . $result['status'] . "</td>";
                            echo "<td>" . $result['notes'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No matching results found.";
                    }
                ?>
            </div>
        </main>
        <?php include("includes/footer.php"); ?>
    </div>
</body>
</html>
