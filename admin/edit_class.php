<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Get form data
  $class_id = $_POST['ClassID'];
  $tutor_id = $_POST['TutorID'];
  $subject = $_POST['subject'];
  $description = $_POST['description'];
  $start_date = $_POST['StartDate'];
  $start_time = $_POST['StartTime'];
  $end_time = $_POST['EndTime'];
  $class_capacity = $_POST['ClassCapacity'];
  $class_price = $_POST['ClassPrice'];
  
  // Prepare and execute the SQL statement to update the class
  $stmt = $conn->prepare("UPDATE classes SET TutorID = ?, Subject = ?, Description = ?, StartDate = ?, StartTime = ?, EndTime = ?, ClassCapacity = ?, ClassPrice = ? WHERE ClassID = ?");
  $stmt->bind_param("isssssidi", $tutor_id, $subject, $description, $start_date, $start_time, $end_time, $class_capacity, $class_price, $class_id);
  $stmt->execute();
  
  // Redirect to the class list page
 echo '<script>
 window.location.href = "class_table.php";
 </script>
 ';
 
} else {
  // Get the class ID from the URL
  $class_id = $_GET['id'];
  
  // Prepare and execute the SQL statement to get the class by ID
  $stmt = $conn->prepare("SELECT * FROM classes WHERE ClassID = ?");
  $stmt->bind_param("i", $class_id);
  $stmt->execute();
  $result = $stmt->get_result();
  
  // Fetch the class data
  $class = $result->fetch_assoc();
  
  // Prepare and execute the SQL statement to get all tutors
  $tutor_stmt = $conn->prepare("SELECT * FROM tutors");
  $tutor_stmt->execute();
  $tutor_result = $tutor_stmt->get_result();
}
?>

<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary">Edit Class</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <form action="edit_class.php" method="post">
        <input type="hidden" name="ClassID" value="<?php echo $class['ClassID']; ?>">
        <div class="mb-3">
          <label for="Subject" class="form-label">Subject</label>
          <input type="text" class="form-control" id="Subject" name="subject" value="<?php echo $class['Subject']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="Description" class="form-label">Description</label>
          <textarea class="form-control" id="Description" name="description" rows="3" required><?php echo $class['Description']; ?></textarea>
        </div>
        <div class="mb-3">
          <label for="StartDate" class="form-label">Start Date</label>
          <input type="date" class="form-control" id="StartDate" name="StartDate" value="<?php echo $class['StartDate']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="StartTime" class="form-label">Start Time</label>
          <input type="time" class="form-control" id="StartTime" name="StartTime" value="<?php echo $class['StartTime']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="EndTime" class="form-label">End Time</label>
          <input type="time" class="form-control" id="EndTime" name="EndTime" value="<?php echo $class['EndTime']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="ClassCapacity" class="form-label">Class Capacity</label>
          <input type="number" class="form-control" id="ClassCapacity" name="ClassCapacity" min="1" value="<?php echo $class['ClassCapacity']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="ClassPrice" class="form-label">Class Price</label>
          <input type="number" class="form-control" id="ClassPrice" name="ClassPrice" min="0" step="0.01" value="<?php echo $class['ClassPrice']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="TutorID" class="form-label">Tutor</label>
          <select class="form-control" id="tutor" name="TutorID" required>
                            <option value="">----Tutor----</option>
                        <?php
                            // Include database connection file
                            include '../inc/db_connect.php';
                            
                            // Prepare and execute the SQL statement to select all tutors
                            $stmt = $conn->prepare("SELECT TutorID, name FROM tutors");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            // Loop through the result set and output each tutor as an option in the select element
                            while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . $row["TutorID"] . "\">" . $row["name"] . "</option>";
                            }
                            
                            // Close the database connection and free up resources
                            $stmt->close();
                            $conn->close();
                        ?>
                        </select>
        </div>
        <button type="submit"  class="btn btn-primary">Update Class</button>
                                    </form>
                                </div>
                            </div>
                        </div>
   


<?php include('footer.php');?>

