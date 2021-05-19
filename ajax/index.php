<?php
session_start();
unset($_SESSION['students']);
include("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
    <!-- Javascript to call function when checkbox is selected or deselected -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript">
    function addStudent(studentID) {

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
  <body>

    <div class="container-fluid">
      <div class="row">
        <!-- Column for tutor groups -->
        <div class="col-2">
          <h2>Tutor group</h2>
          <p>Select tutor group(s)</p>
          <?php
            $tutor_sql = "SELECT * FROM tutorgroup";
            $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
            $tutor_aa = mysqli_fetch_assoc($tutor_qry);

            do {
              $tutorID = $tutor_aa['tutorgroupID'];
              $tutorcode = $tutor_aa['tutorcode'];
               ?>
              <p><input type="checkbox" id="<?php echo "tutor".$tutorID; ?>" name="" value="<?php echo $tutorID; ?>" onclick="filterstudent(this.value)">
              <label for="<?php echo "tutor".$tutorID; ?>"><?php echo "$tutorcode"; ?></p>
            <?php
            } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry));
           ?>

        </div>

        <!-- Column for students -->
        <div class="col-6">
          <h1>Select students</h1>
          <div class="row">




      <?php
      // Select all students
        $student_sql = "SELECT * FROM student";
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


      ?>
      </div>
      </div>
      <div class="col-4 bg-light" id="selectedStudents">
        <h1>Selected</h1>
      </div>
      </div>

 </div>
 <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
