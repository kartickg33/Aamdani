  <?php include "./db.php"; ?>
  <?php session_start(); ?>
  <?php if(isset($_POST['login'])){
   $username = $_POST['username'];
   $password = $_POST['password'];
   
 $username = mysqli_real_escape_string($connection,$username);
  $password=mysqli_real_escape_string($connection,$password);

 $query = "SELECT * FROM user WHERE username = '$username'";
 $select_user_query = mysqli_query($connection,$query);

//  Error handling remaining

while($row = mysqli_fetch_array($select_user_query)){
  $db_user_id = $row['user_id'];
  $db_password = $row['password'];
  $db_email = $row['email'];
  $db_username = $row['username'];
    if(password_verify($password,$db_password)){
    $_SESSION['user_id'] = $db_user_id;
    $_SESSION['user_username'] = $db_username;
    $_SESSION['user_email'] = $db_email;
    $_SESSION['is_logged_in'] = true;
    header("Location: ../index.php");
  }else{
    // Error handling remaining
    $_SESSION['incorrect_password'] = true;
    header("Location: ../login.php");
  }
}

  }?>