<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Homepage</title>
</head>
<body>
    <div class="container">
        <?php
            include("includes/header.php");
        ?>
        <main>
            <h1>Homepage</h1>
                <a class="homepage-link" href="patient-records.php">Patient Records</a>
                <a class="homepage-link" href="staff-records.php">Staff Records</a>
                <a class="homepage-link" href="medicine-records.php">Medicine Records</a>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>