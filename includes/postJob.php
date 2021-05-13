<?php include "./db.php"; ?>
<?php session_start(); ?>
<?php
 if(isset($_POST['submit_application'])){
 echo $job_title = $_POST['job_title'];
 echo $gender = $_POST['gender'];
 echo $salary = $_POST['salary'];
 echo $description = $_POST['description'];
 echo $pincode = $_POST['pincode'];
 echo $start_date = $_POST['start_date'];
 echo $email = $_SESSION['user_email'];
 echo $id = uniqid();
 echo $location = $_POST['location'];
 echo $duration = $_POST['duration'];
 $creator_id = $_SESSION['user_id'];

 $job_title = mysqli_real_escape_string($connection,$job_title);
 $gender = mysqli_real_escape_string($connection,$gender);
 $salary = mysqli_real_escape_string($connection,$salary);
 $description = mysqli_real_escape_string($connection,$description);
 $pincode= mysqli_real_escape_string($connection,$pincode);
 $start_date = mysqli_real_escape_string($connection,$start_date);
 $email = mysqli_real_escape_string($connection,$email);
 $id = mysqli_real_escape_string($connection,$id);
 $duration = mysqli_real_escape_string($connection,$duration);
 $creator_id = mysqli_real_escape_string($connection,$creator_id);
 $location = mysqli_real_escape_string($connection,$location);

 $query = "Insert into job (id,creator_id,title,gender,salary,description,email,pincode,start_date,duration,location)
  VALUES ('$id','$creator_id','$job_title','$gender','$salary','$description','$email','$pincode','$start_date','$duration','$location')";

  $result = mysqli_query($connection,$query);
  if($result){
      header("Location: ../dashboard.php");
  }

 }else{
    //  Error handling to be done
     echo "False";
 }

?>
