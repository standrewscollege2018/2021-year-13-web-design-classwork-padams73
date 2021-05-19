<!-- The allocatesubjectselect page allows the user
to select a student and assign them to multiple subjects -->
<?php
// Select all students
$student_sql="SELECT * FROM student";
$student_qry=mysqli_query($dbconnect, $student_sql);
$student_aa=mysqli_fetch_assoc($student_qry);

// Select all subjects
$subject_sql="SELECT * FROM subject";
$subject_qry=mysqli_query($dbconnect, $subject_sql);
$subject_aa=mysqli_fetch_assoc($subject_qry);
 ?>
 <!-- Form where the user selects the student and subject(s) -->
<form class="" action="allocatesubject.php" method="post">
  <h2>Select student</h2>
  <select class="" name="studentID">
    <?php
    // Display students in dropdown menu
      do {
        $firstname = $student_aa['firstname'];
        $lastname = $student_aa['lastname'];
        $studentID = $student_aa['studentID'];
        echo "<option value='$studentID'>$firstname $lastname</option>";
      }
      while ($student_aa=mysqli_fetch_assoc($student_qry));

     ?>
  </select>
<h2>Select subject(s)</h2>
  <?php
    do {
      $subjectID = $subject_aa['subjectID'];
      $subject = $subject_aa['subject'];
      echo "<p><input type='checkbox' value='$subjectID' name='subjectID[]'>$subject</p>";
    } while ($subject_aa=mysqli_fetch_assoc($subject_qry))

   ?>
<button type="submit" name="button">Allocate subjects</button>
 </form>
