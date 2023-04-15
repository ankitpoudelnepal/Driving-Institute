<?php
// Connect to the database
include "inc/db_connect.php";

// Insert data into ClassRequest table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $feasible_time = $_POST["feasible_time"];
    $class_id = $_POST["class_id"];
    $message = $_POST["message"];
    $status = 0; // Set default status to "pending"

    $sql = "INSERT INTO ClassRequest (Name, Phone, Email, Address, FeasibleTime, ClassID, Message, Status)
    VALUES ('$name', '$phone', '$email', '$address', '$feasible_time', '$class_id', '$message', '$status')";

    if ($conn->query($sql) === TRUE) {
        // echo "Request submitted successfully!";
        header("Location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
