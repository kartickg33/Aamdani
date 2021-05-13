<?php include "./db.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_POST["edit"])){
 echo $job_title = $_POST['job_title'];
 echo $gender = $_POST['gender'];
 echo $salary = $_POST['salary'];
 echo $description = $_POST['description'];
 echo $pincode = $_POST['pincode'];
 echo $start_date = $_POST['start_date'];
 echo $location = $_POST['location'];
 echo $email = $_SESSION['user_email']; 
 echo $duration = $_POST['duration'];
 echo $job_id = $_SESSION['job_id'];

 $query = "UPDATE job SET title='$job_title', gender='$gender', description='$description',salary='$salary'
 ,pincode='$pincode', start_date='$start_date',duration='$duration',location='$location' where id='$job_id'";

  $result = mysqli_query($connection,$query);
  if($result){
      header("Location: ../applicants.php");
  }

 }else{
    //  Error handling to be done
     echo "False";
 }
?>