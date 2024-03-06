<?php
require_once("checkUserLogin.php");

$invalidMesg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['username']) && !empty($_POST["password"])) {
        $array_user = verifyUsers();
        if (!empty($array_user)) {
            $role = $array_user[0]['Role'];
            switch ($role) {
                case "doctor":
                case "pharmacist":
                case "lab technician":
                case "admin":
                    session_start();
                    $_SESSION['name'] = $array_user[0]['firstName'];
                    $_SESSION['stfID'] = $array_user[0]['staffId'];
                    header("Location: index.php");
                    exit();
                    break;
                default:
                    $invalidMesg = "Invalid role";
                    break;
            }
        } else {
            $invalidMesg = "Invalid username or password. Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/desktop.css" media="only screen and (min-width:720px)" rel="stylesheet" type="text/css">
    <link href="css/mobile.css" media="only screen and (max-width:720px)" rel="stylesheet" type="text/css">
    <script src="javascript/main.js" defer></script>
    <title>Login</title>
</head>
<body>
<div class="container">
  <div id="login-form" class="login-form">

    <form class="form-content" action="login.php" method="post">

      <div class="form-box">
        <h1>Login</h1>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>

        <div id="error-message"><?php echo $invalidMesg; ?></div>

        <button type="submit">Login</button>
      </div>
    </form>
  </div>

 <!-- reference: https://www.w3schools.com/howto/howto_css_login_form.asp -->
 <?php
    include("includes/footer.php");
  ?>
</div>
</body>
</html>
