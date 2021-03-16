<!-- This page is where the admin enters the details of a new tutor being added -->
<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}

 ?>
<h1>Add new tutor</h1>
<!-- Notice that we need the enctype to be set for files to be uploaded -->
<form action="index.php?page=entertutor" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="tutorname" class="form-label">Tutor name</label>
    <input name="name" type="text" class="form-control" id="tutorname" aria-describedby="tutorname">
  </div>
  <div class="mb-3">
    <label for="tutorcode" class="form-label">Tutor code</label>
    <input name="tutorcode" type="text" class="form-control" id="tutorcode">
  </div>
  <div class="mb-3">
    <!-- This is where the user can select the file to upload -->
    <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
