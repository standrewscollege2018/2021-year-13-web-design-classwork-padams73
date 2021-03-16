<!-- This page displays names of all students signed up for selected subject -->
<?php
// First check if a subject has been selected. If not, redirect to index page
if (!isset($_GET['subjectID'])) {
  header("Location:index.php");
}
// Get subjectID
$subjectID = $_GET['subjectID'];
// Get subject name
$subject_sql = "SELECT * FROM subject WHERE subjectID=$subjectID";
$subject_qry = mysqli_query($dbconnect, $subject_sql);
$subject_aa = mysqli_fetch_assoc($subject_qry);
// Display subject name
$subject = $subject_aa['subject'];
echo "<h2>$subject</h2>";

// Get all students in subject
$student_sql = "SELECT student.* FROM studentsubject JOIN student ON studentsubject.studentID=student.studentID WHERE studentsubject.subjectID=$subjectID";
$student_qry = mysqli_query($dbconnect, $student_sql);
// Check if there are any students in this subject
if(mysqli_num_rows($student_qry)==0) {
  echo "No students in this subject";
} else {
$student_aa = mysqli_fetch_assoc($student_qry);

// Display all students
do {
  $firstname = $student_aa['firstname'];
  $lastname = $student_aa['lastname'];

  echo "<p>$firstname $lastname";
} while ($student_aa = mysqli_fetch_assoc($student_qry));
}
 ?>
