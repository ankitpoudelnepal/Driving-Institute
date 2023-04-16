<?php 
include('header.php');

// Include database connection file
include '../inc/db_connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get form data
  $EnrollmentID = $_POST['EnrollmentID'];
  $StudentID = $_POST['StudentID'];
  $ClassID = $_POST['ClassID'];
  $EnrollmentDate = $_POST['EnrollmentDate'];
  $PaymentAmount = $_POST['PaymentAmount'];
  $PaymentDate = $_POST['PaymentDate'];
  
  // Prepare and execute the SQL statement to update the enrollment record
  $stmt = $conn->prepare("UPDATE enrollment SET StudentID = ?, ClassID = ?, EnrollmentDate = ?, PaymentAmount = ?, PaymentDate = ? WHERE EnrollmentID = ?");
  $stmt->bind_param("iisisi", $StudentID, $ClassID, $EnrollmentDate, $PaymentAmount, $PaymentDate, $EnrollmentID);
  $stmt->execute();
  
  // Redirect to the enrollments list page
  echo '<script>
  window.location.href = "enrollment_table.php";
  </script>
  ';

} else {
  // Get the enrollment ID from the URL
  $EnrollmentID = $_GET['id'];
  
  // Prepare and execute the SQL statement to get the enrollment record by ID
  $stmt = $conn->prepare("SELECT * FROM enrollment WHERE EnrollmentID = ?");
  $stmt->bind_param("i", $EnrollmentID);
  $stmt->execute();
  $result = $stmt->get_result();
  
  // Fetch the enrollment data
  $enrollment = $result->fetch_assoc();
}
?>
<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Enrollment</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <form action="edit_enrollment.php" method="post">
        <input type="hidden" name="EnrollmentID" value="<?php echo $enrollment['EnrollmentID']; ?>">
        <div class="form-group">
          <label for="student_id">Student </label>
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
          <label for="class_id">Class </label>
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
        <div class="mb-3">
          <label for="EnrollmentDate" class="form-label">Enrollment Date</label>
          <input type="date" class="form-control" id="EnrollmentDate" name="EnrollmentDate" value="<?php echo $enrollment['EnrollmentDate']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="PaymentAmount" class="form-label">Payment Amount</label>
          <input type="number" class="form-control" id="PaymentAmount" name="PaymentAmount" value="<?php echo $enrollment['PaymentAmount']; ?>" required>
        </div>
        <div class="mb-3">
        <label for="PaymentDate" class="form-label">Payment Date</label>
          <input type="date" class="form-control" id="PaymentDate" name="PaymentDate" value="<?php echo $enrollment['PaymentDate']; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Student</button>
      </form>
    </div>
  