<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Select all tutors from the database
$sql = "SELECT * FROM tutors";
$result = $conn->query($sql);
?>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tutors</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <!-- Bootstrap table for displaying tutors -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Education Level</th>
                        <th>Experience (year)</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any tutors
                    if ($result->num_rows > 0) {
                        // Loop through all tutors and display them in a table
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["TutorID"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            echo "<td>" . $row["Education"] . "</td>";
                            echo "<td>" . $row["ExperienceYear"] . "</td>";
                            echo "<td>" . $row["Description"] . "</td>";
                            echo "<td><a href='edit_tutor.php?id=" . $row["TutorID"] . "'><i class='fa fa-edit'></i></a></td>";
                            echo "<td><a href='delete_tutor.php?id=" . $row["TutorID"] . "'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No tutors found.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
