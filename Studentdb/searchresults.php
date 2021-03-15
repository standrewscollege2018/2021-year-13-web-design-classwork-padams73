<div class="container-fluid">


<?php
  if(!isset($_POST['search'])) {
    header("Location: search.php");
  }
  $search = $_POST['search'];

  $result_sql = "SELECT * FROM student WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";

  $result_qry = mysqli_query($dbconnect, $result_sql);

  echo "<div class='row'>";

  if(mysqli_num_rows($result_qry)==0) {
      echo "<h1>No results found</h1>";
    } else {
      $result_aa = mysqli_fetch_assoc($result_qry);

      do {
        $firstname = $result_aa['firstname'];
        $lastname = $result_aa['lastname'];
        $photo = $result_aa['photo'];
        $studentID = $result_aa['studentID'];
        ?>

        <div class="col-md-4">

          <a href="index.php?page=student&studentID=<?php echo $studentID; ?>">
          <img src="images/<?php echo $photo; ?>" class="img-fluid" alt="">
          <p><?php echo "$firstname $lastname"; ?></p>
        </a>
          </div>
      <?php
        } while ($result_aa = mysqli_fetch_assoc($result_qry));


  }
echo "</div>";
 ?>
</div>
