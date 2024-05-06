<?php
// Retrieve the username from the URL parameter
$username = $_GET['username'];

// Sanitize the username to prevent XSS attacks
$username = htmlspecialchars($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: url("background.jpg");

    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.6);
      border-radius: 10px;
      margin-top: 50px;
  }

    h1 {
      text-align: center;
      color: #f4f1f1;
    }

    .dashboard {
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
       align-items: center;
    }

    .profile-info {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .profile-icon {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background-color: #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-right: 20px;
    }

    .profile-icon img {
      width: 60%;
      height: auto;
    }

    .profile-info h2 {
      margin: 0;
      color: #333;
    }

    .points {
      font-size: 24px;
      text-align: center;
      margin-bottom: 20px;
    }

    button {
      display: block;
      width: 200px;
      margin: 0 auto;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>User Profile Dashboard</h1>
    <div class="dashboard">
      <div class="profile-info">
        <div class="profile-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
        </div>
        <h2>Welcome, <?php echo $username; ?>!</h2>
      </div>
      <div class="points">Points Gained: <span id="points">100🔥</span></div>
      <button onclick="redirectToSearchPage()">Go to Search Page</button>
    </div>
  </div>

  <script>
    // Retrieve the username from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const username = urlParams.get('username');

    // Set the username in the profile
    document.getElementById('username').innerText = username;

    function redirectToSearchPage() {
      // Redirect to the search.html page
      window.location.href = "search.html";
    }
  </script>
</body>
</html>