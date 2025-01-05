<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$servername = "localhost"; // WAMP server host
$username = "root";         // Default username for WAMP
$password = "";             // Default password for WAMP (leave empty if not set)
$dbname = "roshan25";       // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Log the error instead of dying
    error_log("Connection failed: " . $conn->connect_error);
    die("Connection failed. Please try again later.");
}

// SQL query to fetch data from the users table
$sql = "SELECT * FROM logindata";
$res = $conn->query($sql);

// Check if there are results and output data
if ($res->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <thead>
            <tr>
                <th>User Name</th>
                <th>Email</th>  
                <th>Password</th>
                <th>Full name</th>
                <th>phone</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>";
            while($row = $res->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["pswd"] . "</td>
                        <td>" . $row["fullname"] . "</td>
                        <td>" . $row["phone"] . "</td>
                        <td>" . $row["address"] . "</td>
                      </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "0 results";
        }

// Close connection
$conn->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-dashboard</title>
    <!-- <link rel="stylesheet" href="css/dashboard.css"> -->
</head>
<body>
    <!-- <script>
        const allowedReferrer = "http://localhost/Home%20-appliance/dashboard.php";
        const redirectUrl = "http://www.google.com"; 
        if (document.referrer !== allowedReferrer) {
            alert("You are not allowed to access this page directly. You will be redirected.");
            window.location.href = redirectUrl;
        }
    </script> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 50px;
        }
        th, td {
            border: 2px solid rgba(230, 225, 225, 0.838);
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        #logout-btn{
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        #logout-btn:hover{
            background-color: #45a059;
        }
        #del-btn{
            background-color: #4CAF50;
            color: white;
        }
        nav {
            display: flex;
            flex-direction: row; 
            justify-content: center; 
            position: fixed; 
            top: 5px; 
            left: 20px;
            right: 20px;
            width: 100%;
            z-index: 1000; 
        }
        nav,
        .nav-item {
            display: flex;
        }

        nav {
            border-radius: 6px;
            background-color: green;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            box-shadow: 1px 2px 4px rgb(20, 20, 20), 0 4px 12px rgb(10, 10, 10);
        }

        .nav-item {
            flex-direction: row-reverse;
            font-size: 0.8999rem;
            line-height: 1rem;
            align-items: center;
            min-width: 120px;
            justify-content: center;

            &.active {
                color: $primary;
                text-shadow: 0 0 3px hsla(260, 100%, 70%, 0.7);
            }

            &:not(.active):hover {
                color: rgba(255, 255, 255, 0.87);
            }

            &:hover > .icon .subicon {
                height: 32px;
                width: 32px;
                border-radius: 32px;
                top: -16px;
                right: -16px;
                border-color: white;
            }

            &:not(:first-of-type) {
                border-left: 1px solid rgb(60, 60, 60);
            }
            &:not(:last-of-type) {
                border-right: 0.1rem solid black;
            }

            a {
                color: inherit;
                text-decoration: none;
                padding: 1ch;
            }

            .icon {
                padding: 1ch;
                position: relative;

                .subicon {
                    text-shadow: none;
                    transition: all 40ms ease;
                    position: absolute;
                    top: -3px;
                    right: -3px;
                    background: red;
                    color: white;
                    box-shadow: 0 0 4px rgba(41, 41, 41, 0.405);
                    width: 18px;
                    height: 18px;
                    border-radius: 14px;
                    font-size: 0.7em;
                    font-weight: 700;
                    display: inline-grid;
                    place-items: center;
                    border: 2px solid mix(white, red);
                }
            }

            .icon > svg {
                max-width: 16px;
            }
        }

    </style>
    <nav class="menu" id="nav">
        <span class="nav-item active">
            <span class="icon">
                <i data-feather="home"></i>
            </span>
            <a href="index.html">Home</a>
        </span>
        <span class="nav-item">
            <span class="icon">
                <i data-feather="search"></i>
            </span>
            <a href="dashboard.php">Order list</a>
        </span>
        <span class="nav-item">
            <span class="icon">
                <i data-feather="bell"></i>
            </span>
            <a href="admin-login.html">Logout</a>
        </span>
    </nav>

    <script src="js/dash.js"></script>
</body>
</html>