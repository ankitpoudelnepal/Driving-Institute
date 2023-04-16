<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    // Get form data
    $name = $_POST['name'];
    $education = $_POST['education'];
    $experience_year = $_POST['experience_year'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $hourly_rate = $_POST['hourly_rate'];
    $user_id = 1; // Static value of user_id
    
    // Prepare and execute the SQL statement to insert the tutor
    $stmt = $conn->prepare("INSERT INTO tutors (TutorID, UserID, ExperienceYear, Education, Description, HourlyRate, email, address, phone, Name) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssdssss", $user_id, $experience_year, $education, $description, $hourly_rate, $email, $address, $phone, $name);
    $stmt->execute();
  
  // Redirect back to the form
  echo "<script> window.location.href = 'tutor_table.php'; </script>";
  exit();
}
?>

<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Add Tutor</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <form method="POST" action="add_tutor.php">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="experience_year">Experience Year</label>
          <input type="number" class="form-control" id="experience_year" name="experience_year" required>
        </div>
        <div class="form-group">
          <label for="education">Education</label>
          <input type="text" class="form-control" id="education" name="education" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
          <label for="hourly_rate">Hourly Rate</label>
          <input type="number" class="form-control" id="hourly_rate" name="hourly_rate" required>
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

<?php include('footer.php'); ?>

