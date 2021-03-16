<!-- This page assigns students into the selected subjects -->
<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}
// Get the studentID of the selected student
$studentID = $_POST['studentID'];
// Get the array containing the IDs of the selected subjects
$subjectlist = $_POST['subjectID'];
$student_sql = "SELECT * FROM student WHERE studentID=$studentID";
$student_qry = mysqli_query($dbconnect, $student_sql);
$student_aa = mysqli_fetch_assoc($student_qry);
$firstname = $student_aa['firstname'];
$lastname = $student_aa['lastname'];
echo "$firstname $lastname has been assigned to the following classes:";

// Loop through the array of selected subjects and run an insert query for each
// We insert a record into the studentsubject linking table, that links the student and subject tables
foreach ($subjectlist as $subjectID) {
  $sql = "INSERT INTO studentsubject (studentID, subjectID) VALUES ($studentID, $subjectID)";
  $qry = mysqli_query($dbconnect, $sql);

// Display the subjects the student has been added to
  $subject_sql = "SELECT * FROM subject WHERE subjectID=$subjectID";
  $subject_qry = mysqli_query($dbconnect, $subject_sql);
  $subject_aa = mysqli_fetch_assoc($subject_qry);
  $subject = $subject_aa['subject'];
  echo "<p>$subject</p>";
}
 ?>
