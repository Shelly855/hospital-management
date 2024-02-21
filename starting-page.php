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
  <button onclick="document.getElementById('id01').style.display='block'">Login</button>
  <div id="id01" class="login-form">
    <span onclick="document.getElementById('id01').style.display='none'"
  class="close" title="Close Form">&times;</span>

    <form class="form-content" onsubmit="return login()">

      <div class="form-box">
        <h1>Login</h1>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

        <button type="submit">Login</button>
      </div>

      <div class="form-box" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
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