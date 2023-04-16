<?php 
include('header.php');

// Include database connection file
include '../inc/db_connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get form data
  $StudentID = $_POST['StudentID'];
  $UserID = $_POST['UserID'];
  $EducationLevel = $_POST['EducationLevel'];
  $Description = $_POST['Description'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $age = $_POST['age'];
  $Name = $_POST['Name'];
  
  // Prepare and execute the SQL statement to update the student record
  $stmt = $conn->prepare("UPDATE students SET UserID = ?, EducationLevel = ?, Description = ?, email = ?, address = ?, phone = ?, age = ?, Name = ? WHERE StudentID = ?");
  $stmt->bind_param("isssssisi", $UserID, $EducationLevel, $Description, $email, $address, $phone, $age, $Name, $StudentID);
  $stmt->execute();
  
  // Redirect to the students list page
  echo '<script>
  window.location.href = "student_table.php";
  </script>
  ';

} else {
  // Get the student ID from the URL
  $StudentID = $_GET['id'];
  
  // Prepare and execute the SQL statement to get the student record by ID
  $stmt = $conn->prepare("SELECT * FROM students WHERE StudentID = ?");
  $stmt->bind_param("i", $StudentID);
  $stmt->execute();
  $result = $stmt->get_result();
  
  // Fetch the student data
  $student = $result->fetch_assoc();
}
?>


<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Student</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <form action="edit_student.php" method="post">
        <input type="hidden" name="StudentID" value="<?php echo $student['StudentID']; ?>">
        <input type="hidden" name="UserID" value="1">
        <div class="mb-3">
          <label for="Name" class="form-label">Name</label>
          <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $student['Name']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $student['email']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address" value="<?php echo $student['address']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $student['phone']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="age" class="form-label">Age</label>
          <input type="number" class="form-control" id="age" name="age" min="1" max="120" value="<?php echo $student['age']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="EducationLevel" class="form-label">Education Level</label>
          <input type="text" class="form-control" id="EducationLevel" name="EducationLevel" value="<?php echo $student['EducationLevel']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="Description" class="form-label">Description</label>
          <textarea class="form-control" id="Description" name="Description" required><?php echo $student['Description']; ?></textarea>
        </div>
       
       
        <button type="submit" class="btn btn-primary">Update Student</button>
      </form>
    </div>
  </div>
</div>

                        
<?php include('footer.php');?>