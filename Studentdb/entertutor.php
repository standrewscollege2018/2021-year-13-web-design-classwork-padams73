<?php
// Check to see if user is logged in

if(!isset($_SESSION['admin'])) {
  // Not logged in, redirect back to index page
  header("Location: index.php");
}

 ?>

<?php
// Check for duplicates first
$name = $_POST['name'];
$tutorcode = $_POST['tutorcode'];

$checktutor_sql = "SELECT * FROM tutorgroup WHERE tutor='$name' or tutorcode='$tutorcode'";

$checktutor_qry = mysqli_query($dbconnect, $checktutor_sql);

if(mysqli_num_rows($checktutor_qry)==0) {


  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // Get the name of the image being uploaded
      $photo = $_FILES["fileToUpload"]["name"];
      // Insert new record into the database
      $addtutor_sql = "INSERT into tutorgroup (tutor, tutorcode, photo) VALUES ('$name', '$tutorcode', '$photo')";
      $addtutor_qry = mysqli_query($dbconnect, $addtutor_sql);
      echo "$name, $tutorcode";

      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
} else {
  echo "
  <div class='alert alert-primary' role='alert'>
  This tutor already exists!
  </div>";

}








?>
