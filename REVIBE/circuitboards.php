<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Profile - Circuitboards Recycling Facilities</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url("background.jpg") no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: relative;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            background-repeat: repeat;
            border-radius: 10px;
            margin-top: 50px;
            position: relative;
        }

        /* Add your CSS styling here */
        h1, h2, p {
            color: #f3eeee;
        }

        .facility-profile {
            max-width: relative;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding: 20px;
            
        }

        .facility-info {
            font-size: 1.2em;
            color: #f3eeee;
            align-items: center;
            text-align: center;
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            margin: 5px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>REVIBE</h1>
    <div class="container">
        <h2>Electronics Recycling Facilities</h2>
        <div class="facility-profile" id="facilityProfile">
            <!-- Facility profile will be dynamically added here -->
            <?php
            // Establishing a database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "evibe";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch rows where electronics is 'yes'
            $sql = "SELECT * FROM `recycle` WHERE `circuitboards` = 'yes'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='facility-info'>";
                    echo "<p><strong>Name:  </strong> " . $row["centre_names"] . "</p>" ."</br>";
                    echo "<p><strong>Address:  </strong> " . $row["address"] . "</p>" ."</br>";
                    echo "<p><strong>Contact:  </strong> " . $row["contact_person"] . "</p>" ."</br>";
                    echo "<p><strong>Phone:   </strong> " . $row["phone"] . "</p>" ."</br>";
                    echo "<p><strong>Accepted Materials:  </strong> Circuit Boards</p>"."</br>";
                    echo "<p><strong>Operational Hours:   </br></strong> Weekdays: " . $row["weekday_time"] . ", Weekends: " . $row["weekend_time"] . "</p>"."</br>";
                    echo "</div>";
                    echo "</div>";
                    echo "<hr>";
                    

                }
            } else {
                echo "<p>No electronics recycling facilities found.</p>";
            }

            $conn->close();
            ?>
        </div>
        
        <div class="button-container">
            <a href="search.html"><button>Back</button></a>
            <a href="recycle.html"><button>Next</button></a>
        </div>
    </div>
</body>
</html>
