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
$adminUsername = $_POST['username'];
$adminPassword = $_POST['password'];

// Sanitize input to prevent SQL injection (optional but recommended)
$adminUsername = mysqli_real_escape_string($conn, $adminUsername);
$adminPassword = mysqli_real_escape_string($conn, $adminPassword);

// Query to check if the admin username and password exist in the database
$sql = "SELECT * FROM `admin` WHERE `username`='$adminUsername' AND `password`='$adminPassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Admin authentication successful
    header("Location: admin_home2.php"); // Redirect to admin home page
} else {
    // Admin authentication failed
    echo "<script>alert('Admin login failed. Please check your credentials.'); window.location.href = 'admin_login.html';</script>";
}

// Close connection
$conn->close();
?>
