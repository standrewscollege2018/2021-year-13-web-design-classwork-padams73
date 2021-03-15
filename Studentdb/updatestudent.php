<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}

// Check if student has been selected
  if(!isset($_GET['studentID'])) {
    header("Location: index.php?page=updatestudentselect&error=noselect");
  }
    $studentID = $_GET['studentID'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $tutorgroupID = $_POST['tutorgroupID'];

    $update_sql = "UPDATE student SET firstname='$firstname', lastname='$lastname', tutorgroupID=$tutorgroupID WHERE studentID=$studentID";
    $update_qry = mysqli_query($dbconnect, $update_sql);

 ?>
 <p>Student has been updated</p>
 <p><a href="index.php">Home</a></p>
