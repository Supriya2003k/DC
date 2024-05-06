<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="search.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REVIBE - E-Waste Recycling Directory</title>
    <style>
        /* Add your CSS styling here */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url("background.jpg");
            background-size: cover;
            color: #fff;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            margin-top: 50px;
        }

        h1, h2 {
            margin-bottom: 20px;
        }

        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 60%;
            border: none;
            border-radius: 5px;
        }

        select {
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .facility-list {
            text-align: left;
        }

        .facility {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .button-container {
            margin-top: 20px;
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

        .icons {
        position: absolute;
        top: 10px;
        right: 10px;
    }

        button:hover {
            background-color: #45a049;
        }

        /* CSS styling remains the same */
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>REVIBE</h1>
    <div class="container">
        <h2>E-Waste Recycling Directory</h2>
        <div class="search-container">
            <select id="Location">
                <option value="">Search by Location</option>
                <option value="Coimbatore">Coimbatore</option>
                <option value="Chennai">Chennai</option>
            </select>
            <select id="filterType">
                <option value="">Filter by Type</option>
                <option value="electronics">Electronics</option>
                <option value="batteries">Batteries</option>
                <option value="circuitboards">Circuit Boards</option>
            </select>
        </div>
        <div class="facility-list" id="facilityList">
            <!-- Facility data will be dynamically added here -->
        </div>
        <div class="button-container">
            <!-- Linking the buttons to the appropriate PHP files -->
            <a href="login.html"><button>Back</button></a>
            <a href="recycle.html"><button>Next</button></a>
        </div>
    </div>
    <div class ="container">
        <div class="visualization">
            <h2>Data Visualization</h2>
            <div class="charts">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="facility-list" id="facilityList">
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

            // Query to fetch user data from the users table
            $sql = "SELECT * FROM `user`";
            $result = $conn->query($sql);
            echo "USERS";
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='facility'>";
                    echo "<h3>" . $row["username"] . "</h3>";
                    echo "<p>Password: " . $row["password"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            // Close connection
            $conn->close();
            ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const Location = document.getElementById('Location');
        const filterType = document.getElementById('filterType');
        const facilityList = document.getElementById('facilityList');
        

        function filterFacilities() {
            const selectedType = filterType.value.toLowerCase();
            

            // Switch case to determine which PHP file to redirect to
            let redirectUrl;
            switch (selectedType) {
                case 'electronics':
                    redirectUrl = 'electronics.php';
                    break;
                case 'batteries':
                    redirectUrl = 'batteries.php';
                    break;
                case 'circuitboards':
                    redirectUrl = 'circuitboards.php';
                    break;
                default:
                    // Redirect to search.php if no valid option is selected
                    redirectUrl = 'search.html';
            }
            
            

            // Redirect to the selected PHP file
            window.location.href = redirectUrl;
        }
        filterType.addEventListener('change', filterFacilities);
        });
        document.addEventListener("DOMContentLoaded", function() {
            // Sample data
            var months = ['January', 'February', 'March', 'April', 'May', 'June'];
            var data = [65, 59, 80, 81, 56, 55]; // Sample data for the number of materials processed each month
            
            // Get the canvas element
            var ctx = document.getElementById('myChart').getContext('2d');
            
            // Create a new Chart instance
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: months, // X-axis labels
                    datasets: [{
                        label: 'Materials Processed',
                        data: data, // Y-axis data
                        backgroundColor: 'rgba(54, 162, 235, 0.5)', // Bar color
                        borderColor: 'rgba(54, 162, 235, 1)', // Border color
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        });
    </script>
</body>
</html>
