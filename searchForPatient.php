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
            <h1>Search For Patient</h1>
            <form action="patient-records.php">
                <input type="submit" value="Back" />
            </form>

            <div class="search-container">
                <form action="" method="GET">
                    <input type="text" class="search" name="surname" placeholder="Search by Surname">
                    <input type="date" class="search" name="date_of_birth" placeholder="Search by DOB">
                    <input type="text" class="search" name="address" placeholder="Search by Address">
                    <button id="search-button" type="submit">Search</button>
                </form>
            </div>

            <div class="table-container">
                <?php
                    if(isset($_GET['surname']) || isset($_GET['date_of_birth']) || isset($_GET['address'])) {
                        include("search/patientSearch.php");
                    }
                    if (isset($searchResults) && !empty($searchResults)) {
                        echo "<table>";
                        echo "<tr>
                        <th>Patient ID</th>
                        <th>First Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postcode</th>
                        </tr>";
                        foreach ($searchResults as $result) {
                            echo "<tr>";
                            echo "<td>" . $result['patient_id'] . "</td>";
                            echo "<td>" . $result['first_name'] . "</td>";
                            echo "<td>" . $result['surname'] . "</td>";
                            echo "<td>" . $result['email'] . "</td>";
                            echo "<td>" . $result['date_of_birth'] . "</td>";
                            echo "<td>" . $result['address'] . "</td>";
                            echo "<td>" . $result['city'] . "</td>";
                            echo "<td>" . $result['postcode'] . "</td>";
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
