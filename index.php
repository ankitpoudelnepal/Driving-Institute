<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Sundar Driving Institute</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <?php
// Include database connection file
include 'inc/db_connect.php';

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

?>

  <body>

    <!-- ***** Preloader Start ***** -->
    
    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-clock-o"></i>Mon-Fri 09:00-17:00</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>090-080-0760</a></li>
              <li><a href="admin/login.php"><i class="fa fa-lock"></i>Admin Login</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
          
        </div>
      </div>
    </div>

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Sundar Driving Institute</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>  
                                      
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="quiz.php">Quiz</a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link" href="one-page.html">One Page</a>
              </li> -->

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text" id="top">
        <div class="Modern-Slider">
          <!-- Item -->
          <div class="item item-1">
            <div class="img-fill">
                <div class="text-content">
                  <h6>We are ready to help you!!</h6>
                  <h4>Become Better<br>Driver</h4>

                  

                  <a href="contact.php" class="filled-button">Contact Us</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
          <!-- Item -->
          <div class="item item-2">
            <div class="img-fill">
                <div class="text-content">
                  <h6>We are here to support you</h6>
                  <h4>Become<br>Your Best</h4>

              

                  <a href="#" class="filled-button">our services</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
          <!-- Item -->
          <div class="item item-3">
            <div class="img-fill">
                <div class="text-content">
                  <h6>We have a solid </h6>
                  <h4>Team<br>&amp; Infrastructure</h4>

                  <!--
                  <p>You can download, edit and use this layout for your business website. Phasellus lacinia ac sapien vitae dapibus. Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</p>
                  -->

                  <a href="about.html" class="filled-button">learn more</a>
                </div>
            </div>
          </div>
          <!-- // Item -->
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4>Request a call back right now ?</h4>
            <span>Hello !! we are going to mention in our institute</span>
          </div>
          <div class="col-md-4">
            <a href="contact.php" class="border-button">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
    <style>
        .carousel-control-prev,
.carousel-control-next {
    z-index: 1;
    font-size: 30px;
    background-color: #a4c639;

}
    </style>
    <hr>
    <div class="section-heading">
              <h2>Our <em>Classes</em></h2>
              <span>We offer these classes!!</span>
            </div>
    <div id="carouselExampleControls" class="carousel slide m-5" data-ride="carousel">
  <div class="carousel-inner p-5 m-5">
    <?php
    // Include database connection file
    include 'inc/db_connect.php';

    // Select all classes with status 1 from the database
    $sql = "SELECT * FROM classes ";
    $result = $conn->query($sql);

    // Initialize loop counter
    $i = 0;

    // Loop through all classes and display them in the carousel
    while ($row = $result->fetch_assoc()) {
      // Set active class for the first item
      $active = ($i == 0) ? 'active' : '';

      // Format start date
      $startDate = date('F j, Y', strtotime($row['StartDate']));

      // Format start time
      $startTime = date('h:i A', strtotime($row['StartTime']));

      // Format end time
      $endTime = date('h:i A', strtotime($row['EndTime']));
    ?>
    <div class="carousel-item <?php echo $active; ?>">
      <div class="row">
        <div class="col-md-2">
          
        </div>
        <div class="col-md-8">
          <div class="down-content">
            <h4><?php echo $row['Subject']; ?></h4>
            <p><?php echo $row['Description']; ?></p>
            <ul class="list-group">
              <li class="list-group-item"><strong>Tutor:</strong> <?php echo $row['TutorID']; ?></li>
              <li class="list-group-item"><strong>Start Date:</strong> <?php echo $startDate; ?></li>
              <li class="list-group-item"><strong>Start Time:</strong> <?php echo $startTime; ?></li>
              <li class="list-group-item"><strong>End Time:</strong> <?php echo $endTime; ?></li>
              <li class="list-group-item"><strong>Class Capacity:</strong> <?php echo $row['ClassCapacity']; ?></li>
              <li class="list-group-item"><strong>Class Price:</strong> <?php echo $row['ClassPrice']; ?></li>
            </ul>
    
            <!-- Button trigger modal -->
<a type="button" class="mt-5  btn btn-success" href = "Enroll.php?class=<?php echo $row['ClassID']; ?>">
  Enroll Now
    </a>


          </div>
        </div>
      </div>
    </div>
    <?php
      // Increment loop counter
      $i++;
    }
    ?>
  </div>
  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a  class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    





    <div class="fun-facts">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="left-content">
              <span>Teaching To Drive</span>
              <h2>For you <em>,By Best</em></h2>
              <p>We are Experienced and Work upon Providing Best Driving Classes  
              <br><br>See our services and surf the sections we provide just for you <br><a href="#" class="filled-button">Visit Services</a>
            </div>
          </div>
          <div class="col-md-6 align-self-center">
            <div class="row">
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit"><?php echo $count_classes; ?></div>
                  <div class="count-title">Our Classes</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit"><?php echo $count_tutors; ?></div>
                  <div class="count-title"> Our Tutors</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit"><?php echo $count_students; ?></div>
                  <div class="count-title">Students</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit"><?php echo $count_questions; ?></div>
                  <div class="count-title">Quiz Questions</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="more-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-6">
                  <div class="left-image">
                    <img src="assets/images/cc.jpg" alt="">
                  </div>
                </div>
                <div class="col-md-6 align-self-center">
                  <div class="right-content">
                    <span>Who we are</span>
                    <h2>Get to know  <em> About Us</em></h2>
                    <p>Our well experienced and trustfull tutor are here for to give you the service of driving course and driving skills.<br><br> Our Tutor are experienced as well as giving more outcome by providing practical and  knowlegde for passing the written exams also </p>
                    <a href="about.html" class="filled-button">About us</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>What they say <em>about us</em></h2>
              <span>testimonials from our clients</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>Prasanna Gorey</h4>
                  <span>CFO at Tech</span>
                  <p>"Really good institute, learned really well and now I am a pro Rider. I want to thank sundar Institute for their dedication."     </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>Ram Babu</h4>
                  <span>Market Specialist</span>
                  <p>"In Today's world full of institutes and classes, I was looking for a better option and I am Glad I found Sundar Driving Institute for my best driving classes"</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>David Tamang</h4>
                  <span>Chief Accountant</span>
                  <p>"This is to encourage all people to join sundar driving Institute. I joined them last month for a week and my skills are really good now."</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>Boom Kaji</h4>
                  <span>Marketing Head</span>
                  <p>"Thankyou Sundar for Helping me out for my driving. I was really poor at the driving skill but now I am good Thanks to all the tutors of Sundar Driving"</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

    <a id=Booking></a>
    <div class="callback-form mb-5" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Request to<em>Book Class</em></h2>
              <span>We will get the notification about your request and notify you.</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
            <form action="add_request.php" method="POST">
  <div class="row">
    <div class="col-lg-4 col-md-12 col-sm-12">
      <label for="name">Full Name:</label>
      <input name="name" type="text" class="form-control" id="name" placeholder="Enter your full name" required>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
      <label for="email">Email:</label>
      <input name="email" type="email" class="form-control" id="email" placeholder="Enter your email address" required>
    </div>
    <div class="col-lg-4 col-md-12 col-sm-12">
      <label for="phone">Phone Number:</label>
      <input name="phone" type="tel" class="form-control" id="phone" placeholder="Enter your phone number" required>
    </div>
    <div class="col-lg-12">
      <label for="address">Address:</label>
      <input name="address" type="text" class="form-control" id="address" placeholder="Enter your address" required>
    </div>
    <div class="col-lg-12">
      <label for="feasible_time">Feasible Time:</label>
      <input name="feasible_time" type="text" class="form-control" id="feasible_time" placeholder="Enter your feasible time" required>
    </div>
    <div class="col-lg-12">
      <label for="class_id">Class:</label>
      <select class="form-control" id="ClassID" name="class_id" required>
                            <option value="">----Class----</option>
                        <?php
                            // Include database connection file
                            include 'inc/db_connect.php';
                            
                            // Prepare and execute the SQL statement to select all tutors
                            $stmt = $conn->prepare("SELECT ClassID,Subject FROM classes");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            // Loop through the result set and output each tutor as an option in the select element
                            while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"" . $row["ClassID"] . "\">" . $row["Subject"] . "</option>";
                            }
                            
                            // Close the database connection and free up resources
                            $stmt->close();
                            $conn->close();
                        ?>
                        </select>
    </div>
    <div class="col-lg-12">
      <label for="message">Message:</label>
      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Enter your message" required></textarea>
    </div>
    <div class="col-lg-12">
      <button type="submit" class="border-button">Submit</button>
    </div>
  </div>
</form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!--<div class="partners">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-partners owl-carousel">
            
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="1" alt="1">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="2" alt="2">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="3" alt="3">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="4" alt="4">
              </div>
              
              <div class="partner-item">
                <img src="assets/images/client-01.png" title="5" alt="5">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Label -->
    <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4>Book a class ?</h4>
            <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
          </div>
          <div class="col-md-4">
            <a href="#" class="border-button"> Book now </a>
          </div>
        </div>
      </div>
    </div>


    <!--Google Map-->

    <div id="map">
      <!-- How to change your map point
        1. Go to Google Maps
        2. Click on your location point
        3. Click "Share" and choose "Embed map" tab
        4. Copy only URL and paste it within the src="" field below
      -->
            <iframe src="https://maps.google.com/maps?q=Av.+Lúcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>

    <!-- Footer Starts Here -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
            <h4>Sundar Driving Institute</h4>
            <p>Kahukhola, Pokhara</p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Useful Links</h4>
            <ul class="menu-list">
              <li><a href="contact.php">Contact</a></li>
              <li><a href="About.html">About </a></li>
              <li><a href="#">Services</a></li>
              <li><a href="quiz.php">Quiz</a></li>
              <li><a href="faq.php">FAQ</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Additional Pages</h4>
            <ul class="menu-list">
              <li><a href="about.html">About Us</a></li>
              <li><a href="car.html.html">Car</a></li>
              <li><a href="#">Quick Support</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item last-item">
            <h4>Contact Us</h4>
            <div class="contact-form">
              <form id="contact footer-contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form> 
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>Copyright &copy; 2023 Sundar Driving Institute
            
          
           
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>