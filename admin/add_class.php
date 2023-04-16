<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';
ob_start();
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Get form data
  $tutor_id = $_POST['TutorID'];
  $subject = $_POST['subject'];
  $description = $_POST['description'];
  $start_date = $_POST['start_date'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];
  $class_capacity = $_POST['ClassCapacity'];
  $class_price = $_POST['ClassPrice'];
  
  // Prepare and execute the SQL statement to insert the class
  $stmt = $conn->prepare("INSERT INTO classes ( TutorID, Subject, Description, StartDate, StartTime, EndTime, ClassCapacity, ClassPrice) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("isssssii", $tutor_id, $subject, $description, $start_date, $start_time, $end_time, $class_capacity, $class_price);
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

                                
            <form method="post" action="add_class.php">
                    <div class="form-group">
                        <label for="tutor">Tutor:</label>
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
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start Time:</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" required>
                    </div>
                    <div class="form-group">
                        <label for="end_time">End Time:</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" required>
                    </div>
                    <div class="form-group">
                        <label for="capacity">Capacity:</label>
                        <input type="number" class="form-control" id="capacity" name="ClassCapacity" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" name="ClassPrice" min="0" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Class</button>
                    </form>

</div>
                            </div>
                        </div>

<?php include('footer.php')?>


