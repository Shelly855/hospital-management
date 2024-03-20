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
            <h1>Search For Prescription</h1>
            <form action="prescriptions.php">
                <input type="submit" value="Back" />
            </form>

            <div class="search-container">
                <form action="" method="GET">
                    <input type="number" class="search" name="patient_id" placeholder="Search by Patient ID">
                    <input type="number" class="search" name="medicine_id" placeholder="Search by Medicine ID">
                    <button id="search-button" type="submit">Search</button>
                </form>
            </div>

            <div class="table-container">
                <?php
                    if(isset($_GET['patient_id']) || isset($_GET['medicine_id'])) {
                        include("search/prescriptionSearch.php");
                    }
                    if (isset($searchResults) && !empty($searchResults)) {
                        echo "<table>";
                        echo "<tr>
                        <th>Patient ID</th>
                        <th>Medicine ID</th>
                        <th>Prescription Quantity</th>
                        <th>Date Issued</th>
                        <th>Date Collected</th>
                        </tr>";
                        foreach ($searchResults as $result) {
                            echo "<tr>";
                            echo "<td>" . $result['patient_id'] . "</td>";
                            echo "<td>" . $result['medicine_id'] . "</td>";
                            echo "<td>" . $result['prescription_quantity'] . "</td>";
                            echo "<td>" . $result['date_issued'] . "</td>";
                            echo "<td>" . $result['date_collected'] . "</td>";
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
