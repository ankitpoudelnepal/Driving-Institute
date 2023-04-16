<?php
// Include database connection file
include '../inc/db_connect.php';

// Initialize variables
$success = false;
$error_msg = '';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];

  // Hash the password
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Prepare and execute the SQL statement to insert the user
  $stmt = $conn->prepare("INSERT INTO users (Username, Password, FirstName, LastName, Email) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $username, $hashed_password, $first_name, $last_name, $email);
  
  if ($stmt->execute()) {
    $success = true;
  } else {
    $error_msg = 'An error occurred while registering. Please try again later.';
  }
  
  // Close statement
  $stmt->close();
  
  // Close database connection
  $conn->close();
}

?>

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />

<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Admin registration form</h3>

                <?php if ($success) { ?>
                  <div class="alert alert-success" role="alert">
                    Registration successful! Please <a href="login.php" class="alert-link">login</a> to continue.
                  </div>
                <?php } else { ?>
                  <?php if ($error_msg != '') { ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $error_msg; ?>
                    </div>
                  <?php }} ?>


                <div class="row">
                    <!-- registration form HTML using Bootstrap -->
                        <form action="register.php" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group mb-5">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
