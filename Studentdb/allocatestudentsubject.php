<!-- This page enables the admin to choose a student and select their subjects -->
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
  <!-- Display a dropdown with a list of all students -->
  <p><select class="" name="studentID">
    <?php
      do {
        $studentID=$student_aa['studentID'];
        $firstname = $student_aa['firstname'];
        $lastname = $student_aa['lastname'];
        echo "<option value='$studentID'>$firstname $lastname</option>";
      } while ($student_aa = mysqli_fetch_assoc($student_qry))


     ?>
  </select>
</p>
<!-- Display all subjects that are available
  Notice that the name of the checkbox is subjectID[]. You need the [] brackets
  so that all selected items are put into an array called subjectID
 -->
  <?php

    do {
      $subjectID = $subject_aa['subjectID'];
      $subject = $subject_aa['subject'];
      echo "<p><label><input type='checkbox' name='subjectID[]' value='$subjectID' ><span>$subject</span></label></p>";
    } while ($subject_aa = mysqli_fetch_assoc($subject_qry))

   ?>

<button type="submit" name="button">Allocate subjects</button>
</form>
