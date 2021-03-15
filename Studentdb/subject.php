<?php
$subjectID = $_GET['subjectID'];
$subject_sql = "SELECT student.*, subject.subject FROM studentsubject JOIN student ON studentsubject.studentID=student.studentID JOIN subject ON studentsubject.subjectID=subject.subjectID WHERE studentsubject.subjectID=$subjectID";
$subject_qry = mysqli_query($dbconnect, $subject_sql);
$subject_aa = mysqli_fetch_assoc($subject_qry);

$subject = $subject_aa['subject'];
echo "<h2>$subject</h2>";

do {
  $firstname = $subject_aa['firstname'];
  $lastname = $subject_aa['lastname'];

  echo "<p>$firstname $lastname";
} while ($subject_aa = mysqli_fetch_assoc($subject_qry))
 ?>
