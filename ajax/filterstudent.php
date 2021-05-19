<head>
  <!-- Javascript to call function when checkbox is selected or deselected -->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <script type="text/javascript">
  function addStudent(studentID) {
    alert("SELECTED");
    var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("selectedStudents").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET","addstudent.php?studentID="+studentID,true);
  xmlhttp.send();
  }

</script>
</head>


<div class="row">


<?php
session_start();
include("dbconnect.php");
$tutorgroupID = $_GET['tutorgroupID'];

if(isset($_SESSION['tutorgroups'])){

        if (in_array($tutorgroupID, $_SESSION['tutorgroups'])) {

          if (($key = array_search($tutorgroupID, $_SESSION['tutorgroups'])) !== false) {
            // echo $_SESSION['tutorgroups'][$key];
    unset($_SESSION['tutorgroups'][$key]);

}

      } else {
        array_push($_SESSION['tutorgroups'],$tutorgroupID);
}
    } else {
        $_SESSION['tutorgroups']=[$tutorgroupID];

    }
?>
<div class="col-8">
<h1>Select students</h1>
<div class="row">




<?php
// Loop through list of selected tutorgroups
foreach ($_SESSION['tutorgroups'] as $tutorgroup) {

// Select all students in that tutorgroup
$student_sql = "SELECT * FROM student WHERE tutorgroupID = $tutorgroup ";
$student_qry = mysqli_query($dbconnect, $student_sql);
// If there are no students, display a message
if(mysqli_num_rows($student_qry)==0) {
echo "<p>No students in database</p>";
} else {
// If there are students, display them as image links
$student_aa = mysqli_fetch_assoc($student_qry);


do {
  $studentID = $student_aa['studentID'];
  $firstname = $student_aa['firstname'];
  $lastname = $student_aa['lastname'];
  $photo = $student_aa['photo'];
?>
<!-- Column for selected student names -->
<div class="col-md-4 studentcheckbox" style="height: 50px;">

<input type="checkbox" id="<?php echo $studentID; ?>" name="" value="<?php echo $studentID; ?>" onclick="addStudent(this.value)">
<label for="<?php echo $studentID; ?>"><?php echo "$firstname $lastname"; ?>


</div><?php
} while ($student_aa = mysqli_fetch_assoc($student_qry));
}
}

?>
</div>
</div>
<div class="col-4 bg-light" id="selectedStudents">
  <h1>Selected</h1>
</div>
</div>
