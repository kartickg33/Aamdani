  <?php include "./db.php"; ?>
  <?php session_start(); ?>
  <?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

require_once "../vendor/autoload.php";
  
   if(isset($_POST['register'])){
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];

 $query = "select * from user where username='$username' OR email='$email'";


 $result = mysqli_query($connection,$query);
 $num = mysqli_num_rows($result);



 if($num==0){
 $username = mysqli_real_escape_string($connection,$username);
 $email = mysqli_real_escape_string($connection,$email);
 $password=mysqli_real_escape_string($connection,$password);
 $user_id = uniqid();

//  password hash not working 
 $hashed_password = password_hash($password,PASSWORD_DEFAULT);

 $query = "Insert into user (user_id,username,email,password) VALUES ('$user_id','$username','$email','$hashed_password')";

 $result = mysqli_query($connection,$query);

//  Error handling remaining

 if($result){
   header("Location: ../index.php");
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_username'] = $username;
    $_SESSION['user_email'] = $email;
    $_SESSION['is_logged_in'] = true;

// mailer starts here
    $mail = new PHPMailer(true);

                        
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "aamdani000@gmail.com";                 
$mail->Password = "Vasu1122!!";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   

$mail->From = "aamdani000@gmail.com";
$mail->FromName = "Aamdani";

$mail->addAddress($email, $username);

$mail->isHTML(true);

$mail->Subject = "Welcome to Aamdani!";
$mail->Body = "<h3>Hey $username!</h3><br>You have successfully registered on our website.<br><br>You can now head to your dashboard and create new job openings. <br><br>To your success,<br><b>Team Aamdani</b>";


try {
    $mail->send();
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}


   
 }
 }else{
   $_SESSION['user_already_exists'] = true;
   header("Location: ../register.php");
 }
}
?>
