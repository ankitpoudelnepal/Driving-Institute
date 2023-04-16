<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Select all classes from the database with tutor name
$sql = "SELECT c.ClassID, t.Name as TutorName, c.Subject, c.Description, c.StartDate, c.StartTime, c.EndTime, c.ClassCapacity, c.ClassPrice 
        FROM classes c 
        INNER JOIN tutors t ON c.TutorID = t.TutorID";
$result = $conn->query($sql);
?>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Classes</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <!-- Bootstrap table for displaying classes -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Class ID</th>
                        <th>Tutor Name</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Class Capacity</th>
                        <th>Class Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any classes
                    if ($result->num_rows > 0) {
                        // Loop through all classes and display them in a table
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["ClassID"] . "</td>";
                            echo "<td>" . $row["TutorName"] . "</td>";
                            echo "<td>" . $row["Subject"] . "</td>";
                            echo "<td>" . $row["Description"] . "</td>";
                            echo "<td>" . $row["StartDate"] . "</td>";
                            echo "<td>" . $row["StartTime"] . "</td>";
                            echo "<td>" . $row["EndTime"] . "</td>";
                            echo "<td>" . $row["ClassCapacity"] . "</td>";
                            echo "<td>" . $row["ClassPrice"] . "</td>";
                            echo "<td><a href='edit_class.php?id=" . $row["ClassID"] . "'><i class='fa fa-edit'></i></a></td>";
                            echo "<td><a href='delete_class.php?id=" . $row["ClassID"] . "'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No classes found.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
