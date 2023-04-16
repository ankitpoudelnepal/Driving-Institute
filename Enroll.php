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

  <body style="background-color:#cdddbe;">

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

    <!-- Page Content -->
 
    
    <style>
        .carousel-control-prev,
.carousel-control-next {
    z-index: 1;
    font-size: 30px;
    background-color: #a4c639;

}
    </style>
    <hr>


    <a id=Booking></a>
    <div class="callback-form mb-5" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Request to<em>Book Class</em></h2>
              <span>
              <?php
                            // Include database connection file
                            include 'inc/db_connect.php';
                            $class_id = $_GET['class'];

                            // Prepare and execute the SQL statement to select all tutors
                            $stmt = $conn->prepare("SELECT c.ClassID, t.Name as TutorName, c.Subject, c.Description, c.StartDate, c.StartTime, c.EndTime, c.ClassCapacity, c.ClassPrice 
                            FROM classes c 
                            INNER JOIN tutors t ON c.TutorID = t.TutorID where ClassID = $class_id");
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            // Loop through the result set and output each tutor as an option in the select element
                            while ($row = $result->fetch_assoc()) {
                              $class_id = $row['ClassID'];
                              $feasible_time = $row['StartTime'];

                              ?>
                              <p> Class Name: 
                              <?php
                                echo $row['Subject'];
                              ?>    
                            </P>
                            <p> Start Date: 
                              <?php
                                echo $row['StartDate'];
                              ?>    
                            </P>
                            <p> Start Time: 
                              <?php
                                echo $row['StartTime'];
                              ?>    
                            </P>
                            <p> End Time: 
                              <?php
                                echo $row['EndTime'];
                              ?>    
                            </P>
                            <p> Price: 
                              <?php
                                echo $row['ClassPrice'];
                              ?>    
                            </P>
                            <p> Class Capacity: 
                              <?php
                                echo $row['ClassCapacity'];
                              ?>    
                            </P>
                            <p> Class Tutor: 
                              <?php
                                echo $row['TutorName'];
                              ?>    
                            </P>


                              <?php
                            }
                            
                            // Close the database connection and free up resources
                            $stmt->close();
                            $conn->close();
                        ?>
              </span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
            <form action="add_request.php" method="POST">
              <input type="hidden" value="<?php echo $class_id?>" name="class_id">
              <input type="hidden" value="<?php echo $feasible_time?>" name="feasible_time">
              <input type="hidden" value="0" name="status ">

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


    <!--Counters-->
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
                  <div class="count-digit">9045</div>
                  <div class="count-title">Work Hours</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">2</div>
                  <div class="count-title"> tutors</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">24</div>
                  <div class="count-title">Vehicles</div>
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
              <li><a href="#">FAQ</a></li>
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
                      <button type="submit" id="form-submit" class="filled-button">Enroll Message</button>
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