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
            <h1>Search For Medicine</h1>
            <form action="medicine-records.php">
                <input type="submit" value="Back" />
            </form>

            <div class="search-container">
                <form action="" method="GET">
                    <input type="number" class="search" name="medicine_id" placeholder="Search by Medicine ID">
                    <input type="text" class="search" name="medicine_name" placeholder="Search by Medicine Name">
                    <button id="search-button" type="submit">Search</button>
                </form>
            </div>

            <div class="table-container">
                <?php
                    if(isset($_GET['medicine_id']) || isset($_GET['medicine_name'])) {
                        include("search/medicineSearch.php");
                    }
                    if (isset($searchResults) && !empty($searchResults)) {
                        echo "<table>";
                        echo "<tr>
                        <th>Medicine ID</th>
                        <th>Medicine Name</th>
                        <th>Type</th>
                        <th>Quantity in Stock</th>
                        <th>Unit</th>
                        </tr>";
                        foreach ($searchResults as $result) {
                            echo "<tr>";
                            echo "<td>" . $result['medicine_id'] . "</td>";
                            echo "<td>" . $result['medicine_name'] . "</td>";
                            echo "<td>" . $result['type'] . "</td>";
                            echo "<td>" . $result['quantity_in_stock'] . "</td>";
                            echo "<td>" . $result['unit'] . "</td>";
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
