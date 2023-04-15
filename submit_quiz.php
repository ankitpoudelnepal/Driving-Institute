<?php
// Include database connection file
include 'inc/db_connect.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Initialize the score
    $score = $_POST['score'];
    $score =$score;
    


    // Loop through all the submitted answers and compare them to the correct answers in the database
    foreach ($_POST['id'] as $id => $selected_option) {
        // Select the correct answer from the database
        $sql = "SELECT correct_opt FROM questions WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $correct_opt = $row['correct_opt'];

        // Compare the selected option to the correct option and update the score if it is correct
        if ($selected_option == $correct_opt) {
            $score++;
        }
    }

    // Insert the score into the database
    // Insert the score into the database
$score = $_POST['score'];
$sql = "INSERT INTO quizscore (score) VALUES ($score)";
if ($conn->query($sql) === TRUE) {
    echo "Score saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>
