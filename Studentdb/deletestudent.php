<?php
// Check if student has been selected
  if(!isset($_GET['studentID'])) {
    header("Location: index.php?page=deletestudentselect&error=noselect");
  } else {
    $studentID = $_GET['studentID'];
    $sql = "DELETE FROM student WHERE studentID = $studentID";
    $qry = mysqli_query($dbconnect, $sql);
    echo "<h2>Student deleted</h2>";
  }

 ?>
 <a href="index.php">Back to home page</a>
