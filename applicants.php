<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin='anonymous'>

</head>
<body>
     <!-- NavBar-->
  <?php include "./includes/db.php"; ?>
  <?php session_start();?>
   <nav class="navbar sticky-top navbar-expand-lg navbar navbar-dark bg-dark" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.html">Aamdani</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-evenly">
                    <a class="nav-link px-4" aria-current="true" href="index.php">Home</a>
                    <a class="nav-link px-4" href="index.php#services">Services</a>
                    <a class="nav-link px-4" href="search.php">Search</a>
                    <a class="nav-link px-4" href="#footer">Contact</a>
                    <a class="nav-link px-4" href="includes/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav> 
  <?php
  $job_id = $_SESSION['job_id'];
  $query = "SELECT * FROM job WHERE id = '$job_id' ";
  $result = mysqli_query($connection,$query);
  while($row = mysqli_fetch_array($result))
  {
  ?>

    <!-- Job details -->
    <div class="job_detail" style="width:78.5%; margin-left: 130px; margin-bottom:20px;margin-top:60px;">
        <div class="job_1">
            <h2 style="text-align: center;" class="job_head">JOB DETAILS</h2>
        </div>
            <div style="margin-top:30px; margin-bottom: 30px;display: flex; flex-direction: column; flex-wrap: wrap;">
                <p class="job_info" style="margin-left: 58px !important;">Job Title</p>
                <p class="detail_response"><?php echo $row['title']?></p>
                <p class="job_info" style="margin-left: 58px !important;">Job Description</p>
                <p class="detail_response"><?php echo $row['description']?></p>
                <p class="job_info" style="margin-left: 58px !important;">Preferred Gender</p>
                <p class="detail_response"><?php echo $row['gender']?></p>
                <p class="job_info" style="margin-left: 58px !important;">Salary</p>
                <p class="detail_response"><?php echo $row['salary']?></p>
                <p class="job_info" style="margin-left: 58px !important;">Location</p>
                <p class="detail_response"><?php echo $row['location']?></p>
                <p class="job_info" style="margin-left: 58px !important;">Pincode</p>
                <p class="detail_response"><?php echo $row['pincode']?></p>
                <p class="job_info" style="margin-left: 58px !important;">Start Date</p>
                <p class="detail_response"><?php echo $row['start_date']?></p>
                <p class="job_info" style="margin-left: 58px !important;">Duration</p>
                <p class="detail_response"><?php echo $row['duration']?></p>
            </div>
            <?php } ?>
            <div style="display: flex;flex-direction:row;justify-content: center !important; transform: translateX(-5%);">
            <form method = 'post' action = 'includes/deleteJob.php'>  
                <button class="delete_btn" name='delete_job'>Delete Job</button>
            </form>
            <a href="./edit.php">
            <button class="edit_btn">Edit Job</button> 
            </a>
            </div>
            
    </div>

    <!-- Applicants table-->
    <p class="intro_to_applicants">Here are the applicants for the job you posted</p>
    <table class="applicants-table">
        <tr>
            <th class= "applicants-heading">Name</th>
            <th class= "applicants-heading">Age</th>
            <th class= "applicants-heading">City</th>
            <th class= "applicants-heading">Contact</th>
        </tr>
        <?php
        $query="SELECT * from applicant WHERE job_id = '$job_id'";
        $result = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($result))
        {
        ?>
        <tr>
            <td class="applicants-data"><?php echo $row['name']?></td>
            <td class="applicants-data"><?php echo $row['age']?></td>
            <td class="applicants-data"><?php echo $row['city']?></td>
            <td class="applicants-data"><?php echo $row['contact']?></td>
        </tr>
        <?php } ?>
    </table>    


    <!---------------------- FOOTER ----------------------->
    <?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

   require_once "./vendor/autoload.php";
    if(isset($_POST['footer'])){
        $email = $_POST['email'];
        $name = $_POST['name'];
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

$mail->addAddress($email, $name);

$mail->isHTML(true);

$mail->Subject = "Welcome to Aamdani!";
$mail->Body = "<h3>Hey $name!</h3> <br>We have received your message. You will be contacted soon.<br><br>To your success,<br><b>Team Aamdani</b>";


try {
    $mail->send();
    
} catch (Exception $e) {
   echo "Mailer Error: " . $mail->ErrorInfo;
}
    }
    ?>
        <div class = "footer" id="footer">
        <div class="footerleft">
            <h2>Aamdani</h2>
            <div class="footerlefttop">
                <img src="images/fb.png" alt="">
                <img src="images/twitter.png" alt="">
            </div>
            <div class="footerleftbottom">
                <img src="images/insta.png" alt="">
                <img src="images/whatsapp.png" alt="">
            </div>
        </div>
        <div class = "footercenter">
            <h2>Get In Touch</h2>
            <form action='applicants.php#footer' method="post">
                <div class="footercentertop">
                    <input type="text" name="name" id = "footername" placeholder="Name"/>
                    <input type="text" name="email" id ="footermail" placeholder="Email ID"/>
                </div>
                <input type="text" name="message" id = "footermsg" placeholder="Your Message">
                <button type="submit" id="footerbutton" name='footer'>Send</button>
            </form>
        </div>
        <div class="footerright">
            <h2>Address</h2>
            <div class="footerrighttop">
                <p>B28, L-5,<br>Sakshi,<br>Jamshedpur - 831001</p>
            </div>
            <div class="footerrightcenter">
                <img src="images/circle-cropped.png" alt="">
                <p> <br>- 6666677777</p>
            </div>
            <br>
            <div class="footerrightbottom">
                <img src="images/gmail.png" alt="">
                <p> <br>- aamdani000@gmail.com</p>
            </div>
        </div>
        <div class="footerbottom">
            <p>Copyright © 2020 Aamdani. All rights reserved</p>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/42276ea553.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
</body>
</html>