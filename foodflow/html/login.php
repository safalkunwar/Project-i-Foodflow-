<?php
session_start();
include("db.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check if the email and password combination exists
    $query = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Set session variable to indicate that the user is logged in
        $_SESSION['loggedIn'] = true;
        header("Location: home.html");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Invalid email or password')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>
 
<nav class="navbar">
                <ul>
                <li> <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="Logo" height="35" ></a></li>
                    <li><a href="./home.html">Home</a></li>
                    <li><a href="./about.html">About</a></li>
                    <li><a href="./contractus.php">Contact us</a></li>
                    <li><a href="./signup.php">Login/Signup</a>
                </ul>
            </nav>
   
  <div class="login-page">
    <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Email" />
      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="password" />
      <button type="submit" id="loginButton">login</button>
      <p class="message">Not registered?
        <a href="./signup.php" style="color: white;">Create an account</a>
      </p>
    </form>
  </div>
  <script src="app.js"></script>
  
</body>
</html>