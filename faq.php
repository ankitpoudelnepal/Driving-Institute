<?Php

include 'header2.php';
?>

<html>
<head>
<style>
.faq-section {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  font-family: Arial, sans-serif;
}

.faq-section h2 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.faq-section ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.faq-section li {
  margin-bottom: 20px;
}

.faq-section label {
  font-weight: bold;
  cursor: pointer;
}

.faq-section input[type=checkbox] {
  display: none;
}

.faq-section input[type=checkbox]:checked + label + p {
  display: block;
}

.faq-section p {
  display: none;
  margin-top: 5px;
}

  </style>
</head>
<body>
<div class="faq-section" style="margin-top:80px;">
  <h2>Frequently Asked Questions</h2>
  <ul>
    <li>
      <input type="checkbox" id="faq1" />
      <label for="faq1">How long does it take to get a driver's license?</label>
      <p>It varies by state, but generally it takes between 6 months to a year to get a driver's license.</p>
    </li>
    <li>
      <input type="checkbox" id="faq2" />
      <label for="faq2">What are the requirements to enroll in a driving school?</label>
      <p>Requirements vary by state, but generally you need to be at least 16 years old and have a valid learner's permit or driver's license.</p>
    </li>
    <li>
      <input type="checkbox" id="faq3" />
      <label for="faq3">What kind of cars do you use for driving lessons?</label>
      <p>We use modern and well-maintained cars that meet all safety requirements.</p>
    </li>
    <li>
      <input type="checkbox" id="faq4" />
      <label for="faq4">What is the cost of driving lessons?</label>
      <p>Costs vary depending on the package you choose, but our prices are competitive and affordable.</p>
    </li>
    <li>
      <input type="checkbox" id="faq5" />
      <label for="faq5">Do you offer behind-the-wheel training?</label>
      <p>Yes, we offer behind-the-wheel training as part of our driving packages.</p>
    </li>
    <li>
      <input type="checkbox" id="faq6" />
      <label for="faq6">Do you offer online classes?</label>
      <p>Yes, we offer online classes as well as in-person classes.</p>
    </li>
    <li>
      <input type="checkbox" id="faq7" />
      <label for="faq7">Do you offer defensive driving courses?</label>
      <p>Yes, we offer defensive driving courses for drivers who want to improve their skills and reduce the risk of accidents.</p>
    </li>
    <li>
      <input type="checkbox" id="faq8" />
      <label for="faq8">Can I use my own car for driving lessons?</label>
      <p>Yes, you can use your own car for driving lessons if it meets our safety requirements.</p>
    </li>
    <li>
      <input type="checkbox" id="faq9" />
      <label for="faq9">Do you offer refresher courses?</label>
      <p>Yes, we offer refresher courses for drivers who want to brush up on their skills or need help overcoming bad driving habits.</p>
    </li>
    <li>
      <input type="checkbox" id="faq10" />
      <label for="faq10">What is your cancellation policy?</label>
      <p>We require at least 24 hours notice for cancellations or rescheduling of driving lessons.</p>
    </li>
  </ul>
  </body>
  </html>
</div>
<?php
include 'footer.php';
?>