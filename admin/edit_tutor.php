<?php 
include('header.php');

// Include database connection file
include '../inc/db_connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get form data
  $TutorID = $_POST['TutorID'];
  $UserID = $_POST['UserID'];
  $ExperienceYear = $_POST['ExperienceYear'];
  $Education = $_POST['Education'];
  $Description = $_POST['Description'];
  $HourlyRate = $_POST['HourlyRate'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  
  // Prepare and execute the SQL statement to update the tutor record
  $stmt = $conn->prepare("UPDATE tutors SET UserID = ?, ExperienceYear = ?, Education = ?, Description = ?, HourlyRate = ?, name = ?, email = ?, phone = ?, address = ? WHERE TutorID = ?");
  $stmt->bind_param("iisssssssi", $UserID, $ExperienceYear, $Education, $Description, $HourlyRate, $name, $email, $phone, $address, $TutorID);
  $stmt->execute();
  
  // Redirect to the tutors list page
  echo '<script>
  window.location.href = "tutor_table.php";
  </script>
  ';

} else {
  // Get the tutor ID from the URL
  $TutorID = $_GET['id'];
  
  // Prepare and execute the SQL statement to get the tutor record by ID
  $stmt = $conn->prepare("SELECT * FROM tutors WHERE TutorID = ?");
  $stmt->bind_param("i", $TutorID);
  $stmt->execute();
  $result = $stmt->get_result();
  
  // Fetch the tutor data
  $tutor = $result->fetch_assoc();
}
?>

<div class="col-xl-12 col-lg-12">
<div class="card shadow mb-4">
  <!-- Card Header - Dropdown -->
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Edit Tutor</h6>
  </div>
  <!-- Card Body -->
  <div class="card-body">
    <form action="edit_tutor.php" method="post">
      <input type="hidden" name="TutorID" value="<?php echo $tutor['TutorID']; ?>">
      <input type="hidden" name="UserID" value="1">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $tutor['name']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $tutor['email']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $tutor['phone']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $tutor['address']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="Education" class="form-label">Education</label>
        <input type="text" class="form-control" id="Education" name="Education" value="<?php echo $tutor['Education']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="Experience" class="form-label">Experience</label>
        <input type="number" class="form-control" id="Experience" name="ExperienceYear" value="<?php echo $tutor['ExperienceYear']; ?>" required>
      </div>
      <div class="mb-3">
        <label for="Description" class="form-label">Description</label>
        <textarea class="form-control" id="Description" name="Description" required><?php echo $tutor['Description']; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="HourlyRate" class="form-label">Hourly Rate</label>
        <input type="number" class="form-control" id="HourlyRate" name="HourlyRate" value="<?php echo $tutor['HourlyRate']; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Update Tutor</button>
    </form>
  </div>
</div>
</div>
