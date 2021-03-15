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
    $sql = "SELECT * FROM student WHERE studentID = $studentID";
    $qry = mysqli_query($dbconnect, $sql);
    $aa = mysqli_fetch_assoc($qry);
    $firstname = $aa['firstname'];
    $lastname = $aa['lastname'];
    $photo = $aa['photo'];
    $student_tutorgroupID = $aa['tutorgroupID'];
 ?>
<h1>Update student details</h1>
<form action="index.php?page=updatestudent&studentID=<?php echo $studentID ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="firstname" class="form-label">First name</label>
    <input name="firstname" type="text" class="form-control" id="firstname" aria-describedby="tutorname" value="<?php echo $firstname; ?>">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last name</label>
    <input name="lastname" type="text" class="form-control" id="lastcode" value="<?php echo $lastname; ?>">
  </div>
  <div class="mb-3">
    <div class="form-group col-md-4">
      <label for="tutorcode">Tutor group</label>
      <select id="inputState" class="form-control" name="tutorgroupID">
        <?php
        // Select all tutorgroups and display in select menu
        $tutor_sql = "SELECT * FROM tutorgroup";
        $tutor_qry = mysqli_query($dbconnect, $tutor_sql);
        $tutor_aa = mysqli_fetch_assoc($tutor_qry);
        do {
          $tutorcode = $tutor_aa['tutorcode'];
          $tutorgroupID = $tutor_aa['tutorgroupID'];
          if ($tutorgroupID==$student_tutorgroupID) {
            $required = "selected";
          } else {
            $required = "";
          }
        echo "<option $required value=$tutorgroupID>$tutorcode</option>";
      } while($tutor_aa=mysqli_fetch_assoc($tutor_qry))
        ?>
      </select>
    </div>
  </div>
  <div class="mb-3">
    <img src="images/<?php echo $photo; ?>" alt="">
    <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
