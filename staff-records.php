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
            include("viewUserSql.php");

            $staff = getUsers();
            include("includes/header.php");
        ?>
        <main>
            <h1>Staff Records</h1>
            <form action="createUser.php">
                <input type="submit" value="Create New Staff" />
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
                        <?php
                            for ($i=0; $i<count($staff); $i++):
                        ?>
                        <tr>
                            <td><?php echo $staff[$i]['staff_id']?></td>
                            <td><?php echo $staff[$i]['first_name']?></td>
                            <td><?php echo $staff[$i]['surname']?></td>
                            <td><?php echo $staff[$i]['email']?></td>
                            <td><?php echo $staff[$i]['username']?></td>
                            <td><?php echo $staff[$i]['date_of_birth']?></td>
                            <td><?php echo $staff[$i]['job_role']?></td>
                            <td><?php echo $staff[$i]['hire_date']?></td>
                            <td><?php echo $staff[$i]['department_name']?></td>
                            <td><?php echo $staff[$i]['salary']?></td>
                            <td><a href="updateUser.php?sid=<?php echo $staff[$i]['staff_id']; ?>">Update</a></td>
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