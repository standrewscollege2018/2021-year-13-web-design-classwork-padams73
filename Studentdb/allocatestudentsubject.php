<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}

// Select all subjects
  $subject_sql = "SELECT * FROM subject";
  $subject_qry = mysqli_query($dbconnect, $subject_sql);
  $subject_aa = mysqli_fetch_assoc($subject_qry);
// Select all students
$student_sql = "SELECT * FROM student";
$student_qry = mysqli_query($dbconnect, $student_sql);
$student_aa = mysqli_fetch_assoc($student_qry);


 ?>

<form class="" action="index.php?page=assignsubject" method="post">
  <select class="" name="studentID">
    <?php
      do {
        $studentID=$student_aa['studentID'];
        $firstname = $student_aa['firstname'];
        $lastname = $student_aa['lastname'];
        echo "<option value='$studentID'>$firstname $lastname</option>";
      } while ($student_aa = mysqli_fetch_assoc($student_qry))


     ?>
  </select>
  <?php

    do {
      $subjectID = $subject_aa['subjectID'];
      $subject = $subject_aa['subject'];
      echo "<p><input type='checkbox' name='subjectID[]' value='$subjectID'>$subject</p>";
    } while ($subject_aa = mysqli_fetch_assoc($subject_qry))

   ?>

<button type="submit" name="button">Allocate subjects</button>
</form>
