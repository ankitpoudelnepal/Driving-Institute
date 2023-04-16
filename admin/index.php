
<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Get count of students
$sql_students = "SELECT COUNT(*) as count_students FROM students";
$result_students = $conn->query($sql_students);
$count_students = $result_students->fetch_assoc()['count_students'];

// Get count of tutors
$sql_tutors = "SELECT COUNT(*) as count_tutors FROM tutors";
$result_tutors = $conn->query($sql_tutors);
$count_tutors = $result_tutors->fetch_assoc()['count_tutors'];

// Get count of Classes
$sql_classes = "SELECT COUNT(*) as count_classes FROM classes";
$result_classes = $conn->query($sql_classes);
$count_classes = $result_classes->fetch_assoc()['count_classes'];

// Get count of questions
$sql_questions = "SELECT COUNT(*) as count_questions FROM questions";
$result_questions = $conn->query($sql_questions);
$count_questions = $result_questions->fetch_assoc()['count_questions'];

// // Get count of enrollments
$sql_enrollments = "SELECT COUNT(*) as count_enrollments FROM enrollment";
$result_enrollments = $conn->query($sql_enrollments);
$count_enrollments = $result_enrollments->fetch_assoc()['count_enrollments'];

// // Get count of Requests
$sql_request = "SELECT COUNT(*) as count_requests FROM classrequest WHERE status=0";
$result_request = $conn->query($sql_request);
$count_request = $result_request->fetch_assoc()['count_requests'];


?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                
                    <h2 class="text-danger text-center text-bold">
                        SUNDAR DRIVING INSTITUTE
                    </h2>
                    <hr>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_students; ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-users fa-2x text-gray-300" aria-hidden="true"></i>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tutors</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_tutors; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Questions
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count_questions; ?></div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Classes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_classes; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                Class Request</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_request; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-bell fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Enrollments</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_enrollments; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<?php
// Include database connection file
include '../inc/db_connect.php';

// Select class requests with status 0
$sql = "SELECT cr.RequestID, cr.Name, cr.Phone, cr.Email, cr.Address, cr.FeasibleTime, c.Subject, cr.message, cr.status, cr.submit_datetime
FROM classrequest cr
INNER JOIN classes c ON cr.ClassID = c.ClassID
        WHERE cr.Status = 0";
$result = $conn->query($sql);
?>
<hr>
<div class="ml-5 col-xl-11 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Pending Class Requests</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <!-- Bootstrap table for displaying class requests -->
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                    <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Feasible Time</th>
                        <th>Submitted Time</th>
                        <th>Class</th>
                        <th>Message</th>
                        <th>Add Student</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any class requests
                    if ($result->num_rows > 0) {
                        // Loop through all class requests and display them in a table
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["RequestID"] . "</td>";
                            echo "<td>" . $row["Name"] ."</td>";
                            echo "<td>" . $row["Phone"] . "</td>";
                            echo "<td>" . $row["Email"] . "</td>";
                            echo "<td>" . $row["Address"] . "</td>";
                            echo "<td>" . $row["FeasibleTime"] . "</td>";
                            echo "<td>" . $row["submit_datetime"] . "</td>";
                            echo "<td>" . $row["Subject"] . "</td>";
                            echo "<td>" . $row["message"] . "</td>";
                            echo "<td>
                                <a href='addstudent_fromrequest.php?name=" . $row["Name"] . "&phone=" . $row["Phone"] . "&email=" . $row["Email"] . "&address=" . $row["Address"] . "'> <button class='btn btn-success'> Add Now </button> </a>
                                 </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No pending class requests found.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php include('footer.php'); ?>