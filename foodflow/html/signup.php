<?php
session_start();
include("db.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['fname'];  // Corrected variable name
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
  
    // Validate form data
    if (!empty($email) && !empty($password) && !is_numeric($email)) {  // Corrected logical operator
        $query = "INSERT INTO signup (fristname, lastname, email, password, phone) VALUES ('$firstname', '$lastname', '$email', '$password', '$phone')";
        if (mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'>alert('New record created successfully')</script>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<script type='text/javascript'>alert('Please enter valid information')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodFlow | Signup</title>
    <link rel="stylesheet" href="../css/signup.css">
</head>
<body>
<header>
            <nav class="navbar">
                <ul>
               <li> <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="Logo" height="35" ></a></li>
                    <li><a href="./home.html">Home</a></li>
                    <li><a href="./about.html">About</a></li>
                    <li><a href="./contractus.php">Contact us</a></li>
                    <li><a href="./signup.php">Login/Signup</a>
                </ul>
            </nav>
        </header>

    <div class="signup-background">
        <h1>Sign Up</h1>
        <form action="signup.php" method="POST">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" required placeholder="Enter Your First Name">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" required placeholder="Enter Your Last Name">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="johndoe@example.com">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password here">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required placeholder="9800000000">
            <br>
            <button type="submit">Sign Up</button>
            <div class="already">Already Have an Account?</div>
            <button type="button"><a href="./login.php" style="color: white;">Click Here</a></button>
    </div>
</body>
</html>
