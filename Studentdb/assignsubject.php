<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}

$studentID = $_POST['studentID'];
$subjectlist = $_POST['subjectID'];
$student_sql = "SELECT * FROM student WHERE studentID=$studentID";
$student_qry = mysqli_query($dbconnect, $student_sql);
$student_aa = mysqli_fetch_assoc($student_qry);
$firstname = $student_aa['firstname'];
$lastname = $student_aa['lastname'];
echo "$firstname $lastname has been assigned to the following classes:";

foreach ($subjectlist as $subjectID) {
  $sql = "INSERT INTO studentsubject (studentID, subjectID) VALUES ($studentID, $subjectID)";
  $qry = mysqli_query($dbconnect, $sql);

  $subject_sql = "SELECT * FROM subject WHERE subjectID=$subjectID";
  $subject_qry = mysqli_query($dbconnect, $subject_sql);
  $subject_aa = mysqli_fetch_assoc($subject_qry);
  $subject = $subject_aa['subject'];
  echo "<p>$subject</p>";
}
 ?>
