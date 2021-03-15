<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}

 ?>
<h1>Add new tutor</h1>
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
    <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
