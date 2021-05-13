<?php include "./db.php"; ?>
<?php session_start(); ?>
<?php
$id = $_SESSION['job_id'];
$query = "DELETE FROM job where id = '$id' ";
$result = mysqli_query($connection,$query);
  if($result){
      header("Location: ../dashboard.php");
  }else{
      echo "error";
  }
?>