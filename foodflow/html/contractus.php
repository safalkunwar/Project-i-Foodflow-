<?php
session_start();
include("db.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Query the database to insert the contact information
    $sql = "INSERT INTO contract (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Set session variable to indicate that the contact information was submitted successfully
        $_SESSION['contactSubmitted'] = true;
        header("Location: ./home.html");
        exit();
    } else {
        echo "<script type='text/javascript'>alert('Error submitting the form')</script>";
    }
}
if (isset($_SESSION['contactSubmitted']) && $_SESSION['contactSubmitted'] == true) {
  echo "<p>Your contact information has been submitted successfully.</p>";
  unset($_SESSION['contactSubmitted']);
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Contact Us</title>
  <link rel="stylesheet" href="../css/contractus.css">
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
        
  <div class="contact-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" placeholder="Your Name">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Your Email">
      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone" placeholder="Your Phone">
      <label for="message">Message</label>
      <textarea name="message" id="message" placeholder="Your Message"></textarea>

      <button type="submit" id="submitButton">Submit</button>
    </form>
  </div>

</body>
</html>