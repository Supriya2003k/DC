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
$username = $_POST['username'];
$password = $_POST['password'];

// Sanitize input to prevent SQL injection (optional but recommended)
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Query to fetch user data from the signup table
$sql = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, redirect to profile page with username as a GET parameter
    header("Location: home.php?username=" . urlencode($username));
} else {
    // Incorrect username or password
    echo "<script>alert('Incorrect username or password. Please try again.'); window.location.href = 'login.html';</script>";
}

// Close connection
$conn->close();
?>
