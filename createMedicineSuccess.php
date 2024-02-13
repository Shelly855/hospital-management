<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Creation Successful</title>
</head>
<body>
    <div class="container">
    <?php
            include("includes/header.php");

            $result = isset($_GET['createMedicine']) ? $_GET['createMedicine'] : '';

            $message = ($result) ? "Medicine Supply Record Created Successfully!" : "Medicine Supply Record Creation Failed!";
        ?>  
        <main>
            <h1>Medicine Supply Record Created Successfully!</h1>
            <form action="medicine-records.php">
                <input type="submit" value="Back" />
            </form>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>