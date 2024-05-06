<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "evibe";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Execute SQL query to retrieve facilities where electronics is 'yes'
$query = "SELECT * FROM `recycle` WHERE `electronics` = 'yes'";
$result = $connection->query($query);

// Check if query was successful
if ($result) {
    // Array to hold the retrieved facilities
    $facilities = array();

    // Fetch rows one by one
    while ($row = $result->fetch_assoc()) {
        // Add each row to the facilities array
        $facilities[] = $row;
    }

    // Convert facilities array to JSON format
    $jsonFacilities = json_encode($facilities);

    // Send JSON response back to the client
    header('Content-Type: application/json');
    echo $jsonFacilities;
} else {
    // If query fails, send error response
    http_response_code(500);
    echo json_encode(array("message" => "Failed to retrieve facilities."));
}

// Close database connection
$connection->close();
?>
