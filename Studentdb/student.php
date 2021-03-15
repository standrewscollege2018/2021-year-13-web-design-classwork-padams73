<?php
$studentID = $_GET['studentID'];

$student_sql = "SELECT * FROM student WHERE studentID=$studentID";
$student_qry = mysqli_query($dbconnect, $student_sql);
$student_aa = mysqli_fetch_assoc($student_qry);
$firstname = $student_aa['firstname'];
$lastname = $student_aa['lastname'];
$photo = $student_aa['photo'];




?>
<img src="images/<?php echo $photo; ?>" class="img-fluid" alt="">
<p><?php echo "$firstname $lastname"; ?></p>
<?php
echo "<h2>Subjects</h2>";
$subject_sql = "SELECT subject.subject FROM studentsubject JOIN subject ON studentsubject.subjectID=subject.subjectID WHERE studentsubject.studentID=$studentID";
$subject_qry = mysqli_query($dbconnect, $subject_sql);
if(mysqli_num_rows($subject_qry)==0) {
  echo "Not enrolled for any subjects";
} else {

$subject_aa = mysqli_fetch_assoc($subject_qry);
do {
  $subject = $subject_aa['subject'];
  echo "<p>$subject</p>";
} while ($subject_aa = mysqli_fetch_assoc($subject_qry));
}
 ?>
