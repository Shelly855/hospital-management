<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Staff Records</title>
</head>
<body>
    <div class="container">
        <?php
            include("viewRecordsSql/viewUserSql.php");

            $staff = getUsers();
            include("includes/header.php");
        ?>
        <main>
            <button onclick="topFunction()" class="top-button" title="Go to top">Top</button>
            <h1>Staff Records</h1>
            <form action="createUser.php">
                <input type="submit" value="Create New Staff" />
            </form>
            <form action="searchForStaff.php">
                <input type="submit" value="Search Records" />
            </form>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>DOB</th>
                            <th>Role</th>
                            <th>Hire Date</th>
                            <th>Department</th>
                            <th>Annual Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($staff as $staff): ?>
                        <tr>
                            <td><?php echo $staff['staff_id']; ?></td>
                            <td><?php echo $staff['first_name']; ?></td>
                            <td><?php echo $staff['surname']; ?></td>
                            <td><?php echo $staff['email']; ?></td>
                            <td><?php echo $staff['username']; ?></td>
                            <td><?php echo $staff['date_of_birth']; ?></td>
                            <td><?php echo $staff['job_role']; ?></td>
                            <td><?php echo $staff['hire_date']; ?></td>
                            <td><?php echo $staff['department_name']; ?></td>
                            <td><?php echo $staff['salary']; ?></td>
                            <td><a href="updateUser.php?sid=<?php echo $staff['staff_id']; ?>">Update</a> 
                            <a href="deleteUser.php?sid=<?php echo $staff['staff_id']; ?>">Delete</a></td>
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