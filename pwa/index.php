<?php include('dbconnect.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
  $sql = "SELECT * FROM wp_users";
  $qry = mysqli_query($dbconnect, $sql);
  $aa = mysqli_fetch_assoc($qry);
  do {
    $user = $aa['user_login'];
    echo "<p>$user</p>";
  } while ($aa = mysqli_fetch_assoc($qry));
  include('login.php');
 ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="manifest" href="manifest.webmanifest">
    <title>My PWA!</title>
  </head>
  <body>
    <div class="container-fluid">


    <header>
      <h1>Hi everybody</h1>
      <form>
        <div class="form-group">
          <select class="" name="" id="sourceSelector">
        </div>
      </form>
      </select>
    </header>
    <main></main>

<h2>Quiz here</h2>

</div>

    <script src="app.js" charset="utf-8"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
