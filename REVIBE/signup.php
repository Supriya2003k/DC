<?php
// Establishing a database connection
$servername = "localhost";
$username = "root";
$password = ""; // Assuming no password is set
$database = "evibe";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve input values from the form
$signupUsername = $_POST['username'];
$signupPassword = $_POST['password'];

// Sanitize input to prevent SQL injection (optional but recommended)
$signupUsername = mysqli_real_escape_string($conn, $signupUsername);
$signupPassword = mysqli_real_escape_string($conn, $signupPassword);



// Insert data into the user table
$sql = "INSERT INTO `user` (`username`, `password`) VALUES ('$signupUsername', '$signupPassword')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Sign up successful!'); window.location.href = 'login.html';</script>";
} else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "'); window.location.href = 'signup.html'";
}