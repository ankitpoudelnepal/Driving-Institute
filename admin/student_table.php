<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Select all students from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Students</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <!-- Bootstrap table for displaying students -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Education Level</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any students
                    if ($result->num_rows > 0) {
                        // Loop through all students and display them in a table
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["StudentID"] . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            echo "<td>" . $row["age"] . "</td>";
                            echo "<td>" . $row["EducationLevel"] . "</td>";
                            echo "<td>" . $row["Description"] . "</td>";
                            echo "<td><a href='edit_student.php?id=" . $row["StudentID"] . "'><i class='fa fa-edit'></i></a></td>";
                            echo "<td><a href='delete_student.php?id=" . $row["StudentID"] . "'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No students found.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
