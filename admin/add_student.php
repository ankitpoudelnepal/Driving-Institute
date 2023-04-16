<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    // Get form data
    $name = $_POST['name'];
    $education_level = $_POST['education_level'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $user_id = 1; // Static value of user_id
    
    // Prepare and execute the SQL statement to insert the student
    $stmt = $conn->prepare("INSERT INTO students (StudentID, UserID, EducationLevel, Description, email, address, phone, age, Name) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssis", $user_id, $education_level, $description, $email, $address, $phone, $age, $name);
    $stmt->execute();
  
  // Redirect back to the form
  echo "<script> window.location.href = 'student_table.php'; </script>";
  exit();
}
?>

<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Student</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="age">Age</label>
          <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="form-group">
          <label for="education_level">Education Level</label>
          <select class="form-control" id="education_level" name="education_level" required>
            <option value="high school">High School</option>
            <option value="college">College</option>
            <option value="graduate">Graduate</option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ob_end_flush();?>
