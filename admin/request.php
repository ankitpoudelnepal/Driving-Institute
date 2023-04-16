<?php include('header.php'); ?>

<?php
// Include database connection file
include '../inc/db_connect.php';

// Check if RequestID is set in GET parameters
if (isset($_GET['RequestID'])) {
    $request_id = $_GET['RequestID'];

    // Update the status of the request in the database
    $sql = "UPDATE ClassRequest SET status = (CASE WHEN status = 1 THEN 0 ELSE 1 END) WHERE RequestID = $request_id";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        // Redirect back to the same page to update the table
        header("Location: class_requests.php");
        exit();
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

// Select all requests from the database
$sql = "SELECT cr.RequestID, cr.Name, cr.Phone, cr.Email, cr.Address, cr.FeasibleTime, c.Subject, cr.message, cr.status, cr.submit_datetime
FROM classrequest cr
INNER JOIN classes c ON cr.ClassID = c.ClassID;
";
$result = $conn->query($sql);
?>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Class Requests</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <!-- Bootstrap table for displaying class requests -->
            <table class="table table-striped">
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
                        <th>Status</th>
                        <th>Add Student</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are any class requests
                    if ($result->num_rows > 0) {
                        // Loop through all requests and display them in a table
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
                            <label class='switch'>
                                  <input type='checkbox' " . ($row["status"] == 1 ? "checked" : "") . " onchange='toggleStatus(" . $row["RequestID"] . ")'>
                                  ".($row["status"] == 1 ? "Seen" : "Unseen")."
                                  <span class='slider round'></span>
                                </label></td>";
                                echo "<td>
                                <a href='addstudent_fromrequest.php?name=" . $row["Name"] . "&phone=" . $row["Phone"] . "&email=" . $row["Email"] . "&address=" . $row["Address"] . "'> <button class='btn btn-success'> Add Now </button> </a>
                                 </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No class requests found.";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript function to toggle the status of a class request -->
<script>
function toggleStatus(requestID) {
    // Send a GET request to this same page with the requestID as a parameter
    window.location.href = "request_status.php?RequestID=" + requestID;
}
</script>

<?php include('footer.php'); ?>
