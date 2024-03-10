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
        <h1>Homepage</h1>
        <main>
                <div class="welcome-message">
                    <h2>Welcome</h2>
                </div>
            <div class="contact-info">
                <h3>Contact Us</h3>
                <p><b>Email Address:</b> management@hospital.com</p>
                <p><b>Postal Address:</b> 20 Rhinestone Road, S1 4FX</p>
                <p><b>Contact Number:</b> XXXXX XXXXXX</p>
            </div>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>