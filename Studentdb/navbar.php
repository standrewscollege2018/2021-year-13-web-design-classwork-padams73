<!-- This is the navbar, which is included in the index page, so appears throughout the site -->

<?php
// Select all tutor groups
$tutor_sql = "SELECT * FROM tutorgroup";
$tutor_qry = mysqli_query($dbconnect, $tutor_sql);
$tutor_aa = mysqli_fetch_assoc($tutor_qry);


// Select all subjects
$subject_sql = "SELECT * FROM subject";
$subject_qry = mysqli_query($dbconnect, $subject_sql);
$subject_aa = mysqli_fetch_assoc($subject_qry);

 ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php"><h1>St Andrew's College</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- Login link -->
      <li class="nav-item">
        <!-- Check if user is already logged in.  -->
        <?php
          if(isset($_SESSION['admin'])) {
            // If logged in, display link to admin panel
            echo "<a class='nav-link' href='index.php?page=adminpanel'>Admin </a>";
          } else {
            // If not logged in, display login link
            echo "<a class='nav-link' href='index.php?page=login'>Login </a>";
          }

         ?>

      </li>
      <!-- Display all tutorgroups in a dropdown menu -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tutor groups
        </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
          do {
            $tutorgroupID = $tutor_aa['tutorgroupID'];
            $tutorcode = $tutor_aa['tutorcode'];

            echo "<a class='dropdown-item' href='index.php?page=tutorgroup&tutorgroupID=$tutorgroupID&tutorcode=$tutorcode'>$tutorcode</a>";

           } while ($tutor_aa = mysqli_fetch_assoc($tutor_qry))
        ?>


      </li>
      <!-- Display all subjects in a dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Subjects
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
          do {
            $subjectID = $subject_aa['subjectID'];
            $subject = $subject_aa['subject'];

            echo "<a class='dropdown-item' href='index.php?page=subject&subjectID=$subjectID'>$subject</a>";

          } while ($subject_aa = mysqli_fetch_assoc($subject_qry))
        ?>


      </li>
    </ul>
<!-- Search bar -->
    <form class="form-inline my-2 my-lg-0" action="index.php?page=searchresults" method="post">
      <input required class="form-control mr-sm-2" type="text" name="search" placeholder="Student name">
      <button type="submit" name="button">Search</button>
    </form>

  </div>
</nav>
