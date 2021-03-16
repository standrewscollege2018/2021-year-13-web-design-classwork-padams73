<!-- This page is where the user selects the student to update -->
<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}
 ?>

<h2>Select student to update</h2>
<div class="row">


<?php
// Select all students
  $student_sql = "SELECT * FROM student";
  $student_qry = mysqli_query($dbconnect, $student_sql);
// If no students left in database, display message
  if(mysqli_num_rows($student_qry)==0) {
    echo "<p>No students in database</p>";
  } else {
    // Display all students as image links
    $student_aa = mysqli_fetch_assoc($student_qry);


    do {
      $studentID = $student_aa['studentID'];
      $firstname = $student_aa['firstname'];
      $lastname = $student_aa['lastname'];
      $photo = $student_aa['photo'];
?>
<div class="col-md-4">


<?php
      echo "<a href='index.php?page=updatestudentdetails&studentID=$studentID'><img src='images/$photo' class='img-fluid'>";
      echo "<p>$firstname $lastname</p></a>";
?>
</div><?php
    } while ($student_aa = mysqli_fetch_assoc($student_qry));
  }


?>
</div>
