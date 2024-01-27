function login() {
    // Retrieve username and password
    var username = document.getElementsByName('uname')[0].value;
    var password = document.getElementsByName('psw')[0].value;
  
    // Check if username and password are correct (replace with your authentication logic)
    if (username === "example" && password === "password") {
      // Redirect to the home screen or any desired page
      window.location.href = "patient-records.php";
    } else {
      // Provide feedback for incorrect login (you can customize this part)
      alert("Incorrect username or password");
    }
  }