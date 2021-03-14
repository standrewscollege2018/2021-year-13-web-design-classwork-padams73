<?php
// Check to see if user is logged in
session_start();
if(isset($_SESSION['admin'])) {
  // Already logged in, redirect to the admin panel
  header("Location: index.php?page=adminpanel");
}

 ?>
<!-- The login form goes here -->
<form action="verify.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
