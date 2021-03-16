<!-- Admin panel contains all links to admin pages -->
<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}

 ?>


  <p><a class="" href="index.php?page=addtutor">Add tutor </a></p>

  <p><a class="" href="index.php?page=deletestudentselect">Delete student </a></p>

<p>  <a class="" href="index.php?page=updatestudentselect">Update student </a></p>
<p><a href="index.php?page=allocatestudentsubject">Allocate student to subject(s)</a></p>
<!-- Notice that the logout page is standalone, not inside the index page -->
<p><a class="" href="logout.php">Log out</a></p>

</form>
