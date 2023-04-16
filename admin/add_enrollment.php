<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    // Get form data
    $student_id = $_POST['StudentID'];
    $class_id = $_POST['ClassID'];
    $enrollment_date = $_POST['enrollment_date'];
    $payment_amount = $_POST['payment_amount'];
    $payment_date = $_POST['payment_date'];
    
    echo $status;
    // Prepare and execute the SQL statement to insert the enrollment
    $stmt = $conn->prepare("INSERT INTO enrollment ( StudentID, ClassID, EnrollmentDate, PaymentAmount, PaymentDate) VALUES ( ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $student_id, $class_id, $enrollment_date, $payment_amount, $payment_date);
    $stmt->execute();
  
  // Redirect back to the form
  echo "<script> window.location.href = 'enrollment_table.php'; </script>";
  exit();
}
?>

<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Enrollment</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
          <label for="student_id">Student ID</label>
          <select class="form-control" id="StudentID" name="StudentID" required>
                            <option value="">----Student----</option>
                        <?php
                            // Include database connection file
                            include '../inc/db_connect.php';
                            
                            // Prepare and execute the SQL statement to select all tutors
                            $stmt = $conn->prepare("SELECT StudentID, name FROM students");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            // Loop through the result set and output each tutor as an option in the select element
                            while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . $row["StudentID"] . "\">" . $row["name"] . "</option>";
                            }
                            
                            // Close the database connection and free up resources
                            $stmt->close();
                            $conn->close();
                        ?>
                        </select>
        </div>
        <div class="form-group">
          <label for="class_id">Class ID</label>
          <select class="form-control" id="ClassID" name="ClassID" required>
                            <option value="">----Class----</option>
                        <?php
                            // Include database connection file
                            include '../inc/db_connect.php';
                            
                            // Prepare and execute the SQL statement to select all tutors
                            $stmt = $conn->prepare("SELECT ClassID,Subject FROM classes");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            // Loop through the result set and output each tutor as an option in the select element
                            while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . $row["ClassID"] . "\">" . $row["Subject"] . "</option>";
                            }
                            
                            // Close the database connection and free up resources
                            $stmt->close();
                            $conn->close();
                        ?>
                        </select>
        </div>
        <div class="form-group">
          <label for="enrollment_date">Enrollment Date</label>
          <input type="date" class="form-control" id="enrollment_date" name="enrollment_date" required>
        </div>
   
        <div class="form-group">
          <label for="payment_amount">Payment Amount</label>
          <input type="number" class="form-control" id="payment_amount" name="payment_amount">
        </div>
        <div class="form-group">
          <label for="payment_date">Payment Date</label>
          <input type="date" class="form-control" id="payment_date" name="payment_date">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ob_end_flush();?>
