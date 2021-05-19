<!-- This page checks the username and password of the user -->
<?php
  session_start();

  include("dbconnect.php");
// Get username and password from login page
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Select the record with a matching username

  $user_sql = "SELECT * FROM wp_users WHERE user_login='$username'";
  $user_qry = mysqli_query($dbconnect, $user_sql);

  // Check if there are any records with that username
  if(mysqli_num_rows($user_qry)==0) {
    // No records match this username, so redirect back to login page
    echo "Username Fail";
  } else {
    // We have a match!
    // Let's check the password matches
    $user_aa = mysqli_fetch_assoc($user_qry);

    $hash_password = $user_aa['user_pass'];
    // Check if passwords match
    if(password_verify($password, $hash_password)) {
      // It matches, so start a SESSION and redirect them to the admin panel
      $_SESSION['admin'] = $username;
      // Redirect to admin panel
      echo "Logged in";
    } else {
      // Password didn't match. Redirect to login page
      echo "Password wrong";
    }

  }






 ?>
