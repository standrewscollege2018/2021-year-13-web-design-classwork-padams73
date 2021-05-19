<?php
  $quiz_id = $_GET['quiz_id'];

   // In this section I am trying to display the questions in a specific quiz
   $quiz_sql = "SELECT * FROM wp_mlw_quizzes WHERE quiz_id=$quiz_id";
   $quiz_questions = mysqli_query($dbconnect, $quiz_sql);
   $quiz_aa = mysqli_fetch_assoc($quiz_questions);


     $quiz_question = $quiz_aa['quiz_settings'];



     $quiz_settings = unserialize($quiz_question);
     $quiz_options = unserialize($quiz_settings['quiz_options']);

     $quiz_name = $quiz_options['quiz_name'];
     echo "<h1>$quiz_name</h1>";
     echo "<form action='index.php?page=addresult&quizID=$quiz_id&quiz_name=$quiz_name' method='post'>";
    foreach ($quiz_settings as $setting) {
      // $quiz_settings has 5 sub arrays

      $setting_un = unserialize($setting);
      // Loop through sub array looking for questions in quiz
      foreach ($setting_un as $item) {
        // if we find questions, go get them from the questions table
        if(isset($item['questions'])) {
          // print_r($item['questions']);

          foreach ($item['questions'] as $questionID ) {
              $sql = "SELECT * FROM wp_mlw_questions WHERE question_id=$questionID";
              $questions = mysqli_query($dbconnect, $sql);
              $aa = mysqli_fetch_assoc($questions);
              do {
                // Get question type and question text
                $question_type = $aa['question_type_new'];
                $question = $aa['question_settings'];

                $question_stuff = unserialize($question);
                // print_r($question_stuff);
                echo $question_stuff['question_title'];
                echo "<br/>";
                // Check the question type
                // Display appropriate form components based on question type
                if ($question_type == 5) {
                  echo "<p><textarea rows='4'></textarea></p>";
                } else if ($question_type == 3) {
                  echo "<p><input type='text'></p>";
                } else if ($question_type == 0) {
                  // Multi-choice, so loop through answer_array to get all possible answers
                  $answers = unserialize($aa['answer_array']);
                  foreach ($answers as $answer) {
                    $label = $answer[0];
                    echo "<p><input type='radio' name='$questionID' value='$answer[0]'>$label</p>";

                  }

                }

              } while ($aa = mysqli_fetch_assoc($questions));
          }

        }
      }


    }
    echo "<button type='submit'>Submit form</button>";
    echo "</form>";

  ?>
