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
            <form action="staff-records.php">
                <input type="submit" value="Back" />
            </form>

            <div class="search-container">
                <form action="" method="GET">
                    <input type="text" class="search" name="surname" placeholder="Search by Surname">
                    <input type="date" class="search" name="date_of_birth" placeholder="Search by DOB">
                    <input type="text" class="search" name="job_role" placeholder="Search by Job Role">
                    <input type="text" class="search" name="department_name" placeholder="Search by Department">
                    <button id="search-button" type="submit">Search</button>
                </form>
            </div>

            <?php
                if(isset($_GET['surname']) || isset($_GET['date_of_birth']) || isset($_GET['job_role']) || isset($_GET['department_name'])) {
                    include("staffSearch.php");
                }
                if (isset($searchResults) && !empty($searchResults)) {
                    echo "<table>";
                    echo "<tr>
                    <th>Staff ID</th>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Job Role</th>
                    <th>Hire Date</th>
                    <th>Department</th>
                    <th>Salary</th>
                    </tr>";
                    foreach ($searchResults as $result) {
                        echo "<tr>";
                        echo "<td>" . $result['staff_id'] . "</td>";
                        echo "<td>" . $result['first_name'] . "</td>";
                        echo "<td>" . $result['surname'] . "</td>";
                        echo "<td>" . $result['email'] . "</td>";
                        echo "<td>" . $result['date_of_birth'] . "</td>";
                        echo "<td>" . $result['job_role'] . "</td>";
                        echo "<td>" . $result['hire_date'] . "</td>";
                        echo "<td>" . $result['department_name'] . "</td>";
                        echo "<td>" . $result['salary'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No matching results found.";
                }
            ?>
        </main>
        <?php include("includes/footer.php"); ?>
    </div>
</body>
</html>