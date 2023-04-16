

<?php

include '../inc/db_connect.php';

// check if question ID is set
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // prepare and execute SQL statement to delete the question
    $sql = "DELETE FROM enrollment WHERE EnrollmentID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    // check if the question was deleted successfully
    if ($stmt->affected_rows > 0) {
        // redirect back to the questions page
        header("Location: enrollment_table.php");
    } else {
        // display an error message
        echo "Error deleting enrollment.";
    }
} else {
    // display an error message if question ID is not set
    echo "Enrollment ID not specified.";
}
?>
