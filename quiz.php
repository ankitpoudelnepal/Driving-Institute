<?php
// Include database connection file
include 'inc/db_connect.php';
?>

<div class="header-container" style="margin-bottom: 40px;">
    <?php include('header2.php'); ?>

    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Quiz</h1>
            <span>Answer the questions and grow your knowledge</span>
          </div>
        </div>
      </div>
    </div>

  </div>

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4" style=" margin-top: 80px;">
        <!-- Card Header - Dropdown -->

        <!-- Card Body -->
        
        <div class="card-body">
    <form method="post" action="submit_quiz.php" onsubmit="return validateQuizForm()">
    <input type="hidden" name="score" value="<?php echo $score;?>">    
    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // Select all questions from the database
                $sql = "SELECT * FROM questions";
                $result = $conn->query($sql);

                // Check if there are any questions
                if ($result->num_rows > 0) {
                    // Loop through all questions and display them in a table
                    $score=0; 
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["text"] . "</td>";
                        echo "<td><input type='radio' name='id[".$row['id']."]' value='1' onchange='checkAnswer(this,".$row['correct_opt'].")'></td>";
                        echo "<td><input type='radio' name='id[".$row['id']."]' value='2' onchange='checkAnswer(this,".$row['correct_opt'].")'></td>";
                        echo "<td><input type='radio' name='id[".$row['id']."]' value='3' onchange='checkAnswer(this,".$row['correct_opt'].")'></td>";
                        echo "<td><input type='radio' name='id[".$row['id']."]' value='4' onchange='checkAnswer(this,".$row['correct_opt'].")'></td>";
                        echo "</tr>";
                       
                    }
                } else {
                    echo "No questions found.";
                }
                ?>
            </tbody>
        </table>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>

        </div>
    </div>
</div>

<script>
    var score=0;
  function checkAnswer(selectedOption, correctAnswer) {
    if (selectedOption.value == correctAnswer) {
      score++;
      <?php $score++;?>

    }
  }
    function validateQuizForm() {
  // Get all radio button groups
  var radioGroups = document.querySelectorAll('input[type="radio"]:checked');

  // Check if at least one answer has been selected
  if (radioGroups.length === 0) {
    alert('Please answer at least one question before submitting the quiz.');
    return false;
  }

  // Check if all questions have been answered
  var questionCount = <?php echo $result->num_rows; ?>;
  if (radioGroups.length < questionCount) {
    alert('Please answer all questions before submitting the quiz.');
    return false;
  }

  // If everything is valid, allow the form to be submitted
  return true;
}

</script>

<?php include('footer.php');
echo $score; ?>

