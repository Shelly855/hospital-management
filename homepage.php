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
            <?php
                if(isset($_SESSION['role']) && isset($navigationLinks[$_SESSION['role']])) {
                    echo '<ul>';
                    foreach ($navigationLinks[$_SESSION['role']] as $title => $link) {
                        echo '<li><a href="' . $link . '" class="homepage-link">' . $title . '</a></li>';
                    }
                    echo '</ul>';
                }
            ?>
        </main>
        <?php
            include("includes/footer.php");
        ?>
    </div>
</body>
</html>