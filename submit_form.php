<?php
// Database configuration
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "roshan25";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully"; // Debugging line
}


// $stmt->close();
$fullname = $_POST['fullname'];
$user_mail = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$appliance = $_POST['appliance'];
$service = $_POST['service'];
$time = $_POST['time'];
$massage = $_POST['massage'];
$bhej = "INSERT INTO roshan25.bookings (fullname, user_mail, phone, address, appliance, service, time, massage) values('$fullname', '$user_mail', '$phone', '$address', '$appliance', '$service', '$time', '$massage')";
if(mysqli_query($conn,$bhej)){
    echo "Data inserted successfully";
    // Optionally redirect to a success page
    header("Location: success.php");
    exit();
}
else{
    echo "Error in inserting data" . $conn->error;
}
$bhej->close();
$conn->close();
?>