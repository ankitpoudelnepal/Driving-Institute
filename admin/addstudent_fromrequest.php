<?php
// Connect to the database
include "../inc/db_connect.php";

// Insert data into ClassRequest table

    $name = $_GET["name"];
    $phone = $_GET["phone"];
    $email = $_GET["email"];
    $address = $_GET["address"];

    $sql = "INSERT INTO students (Name, Phone, Email, Address, Description, UserID )
    VALUES ('$name', '$phone', '$email', '$address', 'Added from Class Request.','1')";

    if ($conn->query($sql) === TRUE) {
        // echo "Request submitted successfully!";
        // echo $sql;
        header("Location:student_table.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


$conn->close();
?>
