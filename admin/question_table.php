
<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Get form data
  $text = $_POST['text'];
  $opt1 = $_POST['opt1'];
  $opt2 = $_POST['opt2'];
  $opt3 = $_POST['opt3'];
  $opt4 = $_POST['opt4'];
  $correct_opt = $_POST['correct_opt'];
  
  // Prepare and execute the SQL statement to insert the question
  $stmt = $conn->prepare("INSERT INTO questions (text, opt1, opt2, opt3, opt4, correct_opt) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("sssssi", $text, $opt1, $opt2, $opt3, $opt4, $correct_opt);
  $stmt->execute();
  
  // Redirect back to the form
  header("Location: add_question.php");
  exit();
}
?>

<div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">  Question Table</h6>
                                   
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                        <!-- Bootstrap table for displaying questions -->
                                        <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>Question</th>
                                            <th>Option 1</th>
                                            <th>Option 2</th>
                                            <th>Option 3</th>
                                            <th>Option 4</th>
                                            <th>Correct Option</th>
                                            <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            // Include database connection file
                                            include '../inc/db_connect.php';

                                            // Select all questions from the database
                                            $sql = "SELECT * FROM questions";
                                            $result = $conn->query($sql);

                                            // Check if there are any questions
                                            if ($result->num_rows > 0) {
                                                // Loop through all questions and display them in a table
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["id"] . "</td>";
                                                    echo "<td>" . $row["text"] . "</td>";
                                                    echo "<td>" . $row["opt1"] . "</td>";
                                                    echo "<td>" . $row["opt2"] . "</td>";
                                                    echo "<td>" . $row["opt3"] . "</td>";
                                                    echo "<td>" . $row["opt4"] . "</td>";
                                                    echo "<td>" . $row["correct_opt"] . "</td>";
                                                    echo "<td> 
                                                    <a href='edit_question.php?id=".$row["id"]."'> <i class='fa fa-edit'></i></a>
                                                    <a href='delete_question.php?id=".$row["id"]."'> <i class='fa fa-trash'></i></a>
                                                    </td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "No questions found.";
                                            }
                                            ?>
                                        </tbody>
                                        </table>

                                </div>
                            </div>
                        </div>


<?php include('footer.php'); ?>