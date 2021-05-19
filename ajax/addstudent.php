<?php
session_start();
include("dbconnect.php");
$studentID = $_GET['studentID'];

if(isset($_SESSION['students'])){
        // $students = explode(" ,", $_SESSION['students']);
        if (in_array($studentID, $_SESSION['students'])) {

          if (($key = array_search($studentID, $_SESSION['students'])) !== false) {
            // echo $_SESSION['students'][$key];
    unset($_SESSION['students'][$key]);

}

      } else {
        array_push($_SESSION['students'],$studentID);
}
    } else {
        $_SESSION['students']=[$studentID];

    }

echo "<h1>Selected</h1>";
foreach ($_SESSION['students'] as $student) {
  $student_sql = "SELECT * FROM student WHERE studentID=$student";
  $student_qry = mysqli_query($dbconnect, $student_sql);
  $student_aa = mysqli_fetch_assoc($student_qry);
  $firstname = $student_aa['firstname'];
  $lastname = $student_aa['lastname'];
  echo "<p>$firstname $lastname</p>";
}




 ?>
