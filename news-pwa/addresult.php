<?php
  $quiz_id = $_GET['quizID'];
  $quiz_name = $_GET['quiz_name'];
  $username = 'padams73';

  // foreach ($_POST as $item) {
  //   echo "ANSWER:".$item;
  // }
  $a = array();
  foreach ($_POST as $key => $val) {
    if ($val != 'Submit') {
      array_push($a, $val, 'id', "$key", 'points', '0', 'category', '', 'question_type', '0', 'question_title', 'question');
      // echo "$key = $val";
    }
  }

  $ser = serialize($_POST);
  // echo $ser;
  $ser2 = serialize($a);
  echo $ser2;
  $sql = "INSERT INTO wp_mlw_results (quiz_id, quiz_name, name, quiz_results) VALUES ($quiz_id, '$quiz_name', '$username', '$ser2')";
  $qry = mysqli_query($dbconnect, $sql);
  // echo $sql;
 ?>
