
<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';
ob_start();
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
    
}
?>

<div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Add  Question</h6>
                                   
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <div class="mb-3">
                                        <label for="text" class="form-label">Question Text</label>
                                        <input type="text" class="form-control" id="text" name="text" required>
                                        </div>
                                        <div class="mb-3">
                                        <label for="opt1" class="form-label">Option 1</label>
                                        <input type="text" class="form-control" id="opt1" name="opt1" required>
                                        </div>
                                        <div class="mb-3">
                                        <label for="opt2" class="form-label">Option 2</label>
                                        <input type="text" class="form-control" id="opt2" name="opt2" required>
                                        </div>
                                        <div class="mb-3">
                                        <label for="opt3" class="form-label">Option 3</label>
                                        <input type="text" class="form-control" id="opt3" name="opt3" required>
                                        </div>
                                        <div class="mb-3">
                                        <label for="opt4" class="form-label">Option 4</label>
                                        <input type="text" class="form-control" id="opt4" name="opt4" required>
                                        </div>
                                        <div class="mb-3">
                                        <label for="correct_opt" class="form-label">Correct Option (1-4)</label>
                                        <input type="number" class="form-control" id="correct_opt" name="correct_opt" min="1" max="4" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Create Question</button>
                                    </form>
                                </div>
                            </div>
                        </div>


<?php include('footer.php'); ob_end_flush();?>