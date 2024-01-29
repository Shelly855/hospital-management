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

  <button onclick="document.getElementById('id02').style.display='block'">Sign Up</button>

  <div id="id02" class="form">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Form">&times;</span>
    <form class="form-content" action="includes/signup.php" method="POST">
      <div class="form-box">
        <h1>Sign Up</h1>
        <label for="first-name"><b>First Name</b></label>
        <input type="text" placeholder="Enter First Name" name="first-name" required>

        <label for="surname"><b>Surname</b></label>
        <input type="text" placeholder="Enter Surname" name="surname" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
          
        <button type="submit" class="signup">Sign Up</button>

          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>
    </div>
        <div class="form-box" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </form>
  </div>

  <button onclick="document.getElementById('id01').style.display='block'">Login</button>
  <div id="id01" class="form">
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
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>

      <div class="form-box" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
  </div>

 <!-- reference: https://www.w3schools.com/howto/howto_css_login_form.asp -->
</div>
</body>
</html>