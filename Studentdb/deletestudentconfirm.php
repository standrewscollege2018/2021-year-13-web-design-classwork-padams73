<?php
// Check if student has been selected
  if(!isset($_GET['studentID'])) {
    header("Location: index.php?page=deletestudentselect&error=noselect");
  } else {
    $studentID = $_GET['studentID'];
    $sql = "SELECT * FROM student WHERE studentID = $studentID";
    $qry = mysqli_query($dbconnect, $sql);
    $aa = mysqli_fetch_assoc($qry);
    $firstname = $aa['firstname'];
    $lastname = $aa['lastname'];
    $photo = $aa['photo'];
    echo "<h2>Are you sure you want to delete this student?</h2>";
    echo "<p>$firstname $lastname</p>";
    echo "<img src='images/$photo' class='img-fluid'>";
  }

 ?>
 <p><a href="index.php?page=deletestudent&studentID=<?php echo $studentID; ?>">Yes, delete them</a> | <a href="index.php?page=deletestudentselect">Oops, wrong student</a></p>
<p><a href="index.php">Back to home page</a></p>
