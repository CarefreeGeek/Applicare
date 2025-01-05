<?php
$servername = "localhost"; // WAMP server host
$username = "root";         // Default username for WAMP
$password = "";             // Default password for WAMP (leave empty if not set)
$dbname = "roshan25";       // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the id is set
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // SQL query to delete the record
    $sql = "DELETE FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();

// Redirect back to the dashboard
header("Location: dashboard.php");
exit();
?>