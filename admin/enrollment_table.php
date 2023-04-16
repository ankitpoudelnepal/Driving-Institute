<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Select all enrollments from the database with student name and class subject
$sql = "SELECT e.EnrollmentID, s.Name as StudentName, c.Subject, e.EnrollmentDate, e.PaymentAmount, e.PaymentDate 
        FROM enrollment e 
        INNER JOIN students s ON e.StudentID = s.StudentID 
        INNER JOIN classes c ON e.ClassID = c.ClassID";
$result = $conn->query($sql);
?>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Enrollments</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <!-- Bootstrap table for displaying enrollments -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Enrollment ID</th>
                        <th>Student Name</th>
                        <th>Class Subject</th>
                        <th>Enrollment Date</th>
                        <th>Payment Amount</th>
                        <th>Payment Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any enrollments
                    if ($result->num_rows > 0) {
                        // Loop through all enrollments and display them in a table
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["EnrollmentID"] . "</td>";
                            echo "<td>" . $row["StudentName"] . "</td>";
                            echo "<td>" . $row["Subject"] . "</td>";
                            echo "<td>" . $row["EnrollmentDate"] . "</td>";
                            echo "<td>" . $row["PaymentAmount"] . "</td>";
                            echo "<td>" . $row["PaymentDate"] . "</td>";
                            echo "<td><a href='edit_enrollment.php?id=" . $row["EnrollmentID"] . "'><i class='fa fa-edit'></i></a></td>";
                            echo "<td><a href='delete_enrollment.php?id=" . $row["EnrollmentID"] . "'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No enrollments found.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
