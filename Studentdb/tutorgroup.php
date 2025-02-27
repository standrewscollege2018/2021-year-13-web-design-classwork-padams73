<!-- This page displays all students in the selected tutor group -->
<div class="container-fluid">

<?php
// Check if tutorgroup has been selected. If not, redirect to index page
if(!isset($_GET['tutorgroupID'])) {
  header("Location: index.php");
} else {
  // Select tutorgroup details
  $tutorcode = $_GET['tutorcode'];
  $tutorgroupID = $_GET['tutorgroupID'];
  $tutor_sql = "SELECT * FROM student WHERE tutorgroupID=$tutorgroupID";
  $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
// Check how many students there are. If none, display a message
  if(mysqli_num_rows($tutor_qry)==0) {
    echo "<p>No students in $tutorcode</p>";
  } else {
    $tutor_aa = mysqli_fetch_assoc($tutor_qry);
    echo "<h1>$tutorcode</h1>";
    echo "<div class='row'>";
    do {
      echo "<div class='col-md-4'>";
      $firstname = $tutor_aa['firstname'];
      $lastname = $tutor_aa['lastname'];
      $photo = $tutor_aa['photo'];

      echo "<img src='images/$photo' class='img-fluid'>";
      echo "<p>$firstname $lastname</p>";
      echo "</div>";
    } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));
    echo "</div>";
  }
}

?>
</div>
