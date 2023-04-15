<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sundar Driving - Tutor</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

<!--here put config file -->

// Include database connection file
<?php
include 'inc/db_connect.php';
?>

// Select all tutors from the database
<?php
$sql = "SELECT * FROM tutors";
$result = $conn->query($sql);
?>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-clock-o"></i>Sun-Fri 09:00-17:00</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>9800000000</a></li>
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
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.html">Our Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>

              <!--
              <li class="nav-item">
                <a class="nav-link" href="one-page.html">One Page</a>
              </li>
              -->

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Tutor Page</h1>
            <span>Know about our experienced tutors.</span>
          </div>
        </div>
      </div>
    </div>

    
                    
                   
    <div class="more-info about-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-6 align-self-center">
                  <div class="right-content">

                    <!--<span>our solid background on finance</span>-->

                    <h2>Get to know about <em><?php  if ($result->num_rows > 0) {
                        // Loop through all students and display them in a table
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "</tr>";
                        }
                    } else { echo "No students found.";}?>
                    </em></h2>
                    <?php
                    $sql = "SELECT * FROM tutors";
                    $result = $conn->query($sql);
                    ?>


                    <p><?php  if ($result->num_rows > 0) {
                        // Loop through all students and display them in a table
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            //echo "<td>" . $row["TutorID"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td>" . $row["phone"] . "</td>";
                            echo "<td>" . $row["ExperienceYear"] . "</td>";
                            echo "<td>" . $row["Description"] . "</td>";
                            echo "<td><a href='edit_tutor.php?id=" . $row["TutorID"] . "'><i class='fa fa-edit'></i></a></td>";
                            echo "<td><a href='delete_tutor.php?id=" . $row["TutorID"] . "'><i class='fa fa-trash'></i></a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No students found.";
                    }
                    ?>
                    It is a digital platform for booking the course from inline by choosing its type price and after looking the tuturs.Generally a new advanced technology used website which is more convinent for the intrested who want to learn driving course.</p>
                    <a href="" class="filled-button">Read More</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="left-image">
                    <img src="assets/images/about-image.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    

    <div class="team">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our team <em>members</em></h2>
              <span>Hello friends we are the team members of this institute</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-item">
              <img src="assets/images/team_01.jpg" alt="">
              <div class="down-content">
                <h4>Subodh Puodel</h4>
                <span>Co-Founder</span>
                <p>Hello ! friends welcome to our Driving institute.
                  Request you to join in our Institute.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-item">
              <img src="assets/images/team_02.jpg" alt="">
              <div class="down-content">
                <h4>Garima Kc</h4>
                <span>Chief Marketing Officer</span>
                <p>Hello ! friends welcome to our Driving institute.
                  Request you to join in our Institute.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-item">
              <img src="assets/images/team_03.jpg" alt="">
              <div class="down-content">
                <h4>Paul shrestha</h4>
                <span>Chief Instructor</span>
                <p>Hello ! friends welcome to our Driving institute.
                  Request you to join in our Institute.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="fun-facts">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="left-content">
              <span>Analized of our current Institute</span>
              <h2>Our solutions for your <em>business growth</em></h2>
              <p>hello intrested viewers
              <br><br></p>
              <a href="" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6 align-self-center">
            <div class="row">
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">945</div>
                  <div class="count-title">Work Hours</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">1280</div>
                  <div class="count-title">Great Reviews</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">578</div>
                  <div class="count-title">Projects Done</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">26</div>
                  <div class="count-title">Awards Won</div>
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
              <span>testimonials from our greatest clients</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>Bikram Baral</h4>
                  <span>Car License Student</span>
                  <p>"Hello new learner,intrested for to learn driving course. its a good institute for learn the course. i have passed written exam and trail easily. In this institute you can feel friendly  learning enviroment and provide well condtion vechiles "</p>
                </div>
                </div>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>Jasmina Shrestha</h4>
                  <span>Scooter License Student</span>
                  <p>"Hello new learner,intrested for to learn driving course. its a good institute for learn the course. i have passed written exam and trail easily. In this institute you can feel friendly  learning enviroment and provide well condtion vechiles "</p
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>David Wagle</h4>
                  <span>Motorbike Student</span>
                 <p>"Hello new learner,intrested for to learn driving course. its a good institute for learn the course. i have passed written exam and trail easily. In this institute you can feel friendly  learning enviroment and provide well condtion vechiles "</p>
                </div></p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>Roman Thapa</h4>
                  <span>Moped License Student</span>
                  <p>"Hello new learner,intrested for to learn driving course. its a good institute for learn the course. i have passed written exam and trail easily. In this institute you can feel friendly  learning enviroment and provide well condtion vechiles "</p>
                </div>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>

     <!-- Our Services Section -->

     <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Book your <em>Class</em></h2>
              <span>Book as required you need a course </span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <img src="assets/images/service_01.jpg" alt="">
              <div class="down-content">
                <h4>Car</h4>
                <p>Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.</p>
                <a href="" class="filled-button">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <img src="assets/images/service_02.jpg" alt="">
              <div class="down-content">
                <h4>Scooter</h4>
                <p>Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.</p>
                <a href="" class="filled-button">Book Now</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-item">
              <img src="assets/images/service_03.jpg" alt="">
              <div class="down-content">
                <h4>Motorbike</h4>
                <p>Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.</p>
                <a href="" class="filled-button">Book now</a>
              </div>
            </div>
            </div>
        </div>
      </div>
    </div>


    <!-- Label -->
    <div class="request-form">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h4>Book a class ?</h4>
            <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
          </div>
          <div class="col-md-4">
            <a href="services.html" class="border-button"> Book now </a>
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
            <p>Vivamus tellus mi. Nulla ne cursus elit,vulputate. Sed ne cursus augue hasellus lacinia sapien vitae.</p>
            <ul class="social-icons">
              <li><a rel="nofollow" href="https://fb.com/templatemo" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Useful Links</h4>
            <ul class="menu-list">
              <li><a href="#">Vivamus ut tellus mi</a></li>
              <li><a href="#">Nulla nec cursus elit</a></li>
              <li><a href="#">Vulputate sed nec</a></li>
              <li><a href="#">Cursus augue hasellus</a></li>
              <li><a href="#">Lacinia ac sapien</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Additional Pages</h4>
            <ul class="menu-list">
              <li><a href="#">About Us</a></li>
              <li><a href="#">How We Work</a></li>
              <li><a href="#">Quick Support</a></li>
              <li><a href="#">Contact Us</a></li>
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
            
           <!--  - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p> -->

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