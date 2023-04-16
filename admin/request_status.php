<?php
// Include database connection file
include '../inc/db_connect.php';

// Check if RequestID is set in GET method
if (isset($_GET['RequestID'])) {
    // Get RequestID from GET method
    $requestID = $_GET['RequestID'];

    // Toggle the status of the ClassRequest with the given RequestID from 0 to 1
    $sql = "UPDATE ClassRequest SET status = 1 - status WHERE RequestID = $requestID";

    if ($conn->query($sql) === TRUE) {
        // Success message
        header("Location: request.php");
    } else {
        // Error message
        echo "Error updating status: " . $conn->error;
    }
} else {
    // Error message
    echo "RequestID not set.";
}

// Close database connection
$conn->close();
?>
