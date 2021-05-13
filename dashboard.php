<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
</head>
<body>
     <?php session_start(); ?>
      <?php include "./includes/db.php"; ?>
     <?php
      if(isset($_POST['job_id'])){
            $job_id = $_POST['id'];
            $_SESSION['job_id'] = $job_id;
            header("Location: ./applicants.php");
         }
     ?>
    <!-- NavBar-->
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

    <!-- Create Job card-->
    <div  class="row mt-5 ms-5 justify-content-center" style="width: 1350px; margin-left:80px;">
        <div class="col-md-6" id="create-job">
            
        </div>
        <div class="col-md-5 " id="form">
            <h3 class="mt-4 mb-4" id="h3_create_job">LIST A JOB</h4>
            <form action="includes/postJob.php" id="" class="create-job-form" method='post'>
                <div class="align-middle">
                    <div class=" input-group-lg mb-3">
                        <select name="job_title" placeholder="Job Title" id="job_title" class="form-control form-select" required>
                            <option value="select">Select Job Title</option>
                            <option value="CHEF">Chef</option>
                            <option value="SWEEPER">Sweeper</option>
                            <option value="ELECTRICIAN">Electrician</option>
                            <option value="DRIVER">Driver</option>
                            <option value="PLUMBER">Plumber</option>
                            <option value="PAINTER">Painter</option>
                            <option value="CARPENTER">Carpenter</option>
                            <option value="MAID">Maid</option>
                            <option value="DAILY-WAGE">Daily Wage Worker</option>
                        </select>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <select name="gender" placeholder="Gender" id="gender" class="form-control form-select" icon="fas fa-angle-down" required>
                            <option value="select">Select Preferred Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="NA">Not Applicable</option>
                        </select>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" name="salary" placeholder="Salary" id="salary" class="form-control" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" name="description" placeholder="Description" id="description" class="form-control" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" name="location" placeholder="Location" id="pincode" class="form-control" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="number" name="pincode" placeholder="Pincode" id="pincode" class="form-control" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" onfocus="(this.type = 'date')" name="start_date" placeholder="Start Date (DD-MM-YYYY)" id="date" class="form-control" required>
                    </div>
                    <div class=" input-group-lg mb-3">
                        <input type="text" name="duration" placeholder="Duration" id="duration" class="form-control" required>
                    </div>
                    <div class="mb-3" id="submit">
                        <button class="apply" name='submit_application'>Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- JOBS CREATED -->
    <h3 style="font-weight:700; text-align: center;" class="mt-5">Jobs you Created</h3>

            <div style="width:100%;margin-left:8.5% ;margin-right: auto; ">
      
         <?php
         $id = $_SESSION['user_id'];
         $query = "select * from job where creator_id='$id'";
         $result = mysqli_query($connection,$query);
        $count = mysqli_num_rows($result);
        if($count==0){
          echo '<img src="./images/not-found.svg" alt="not found" align="center" style="width:240px;display:block;margin-left:510px;margin-right:auto;margin-top:12px;padding-top:66px;padding-bottom:66px;">              
          <h5 style="font-weight:700; margin-bottom:85px;margin-left:545px;" class="mt-4">No jobs created</h5>
          ' ;
        }else {
            echo "<ul>";
         while($row = mysqli_fetch_assoc($result))
         {?>
          <li class="booking-card" style="background-image: url(<?php 
          if($row['title']=='CHEF'){
              echo './images/chef.jpeg';
          }else if($row['title']=='SWEEPER'){
              echo './images/sweeper.jpeg';
          }else if($row['title']=='ELECTRICIAN'){
             echo './images/elec.jpeg';
          }else if($row['title']=='DRIVER'){
             echo './images/driver.jpeg';
          }else if($row['title']=='PLUMBER'){
             echo './images/plumber.png';
          }else if($row['title']=='PAINTER'){
             echo './images/painter.jpeg';
          }else if($row['title']=='CARPENTER'){
             echo './images/carpenter.jpeg';
          }else if($row['title']=='MAID'){
             echo './images/domestic-help.jpeg';
          }else if($row['title']=='DAILY-WAGE'){
             echo './images/daily.jpeg';
          } ?>
          );">
          <div class="book-container">
            <div class="content">
              <form method = 'post' action = './dashboard.php'>
              <input type='hidden' name='id' value = <?php echo $row['id'] ; ?>>
              <button class="btn btn-info" style="height:50px;" name ='job_id' >View Applicants</button></a>
              </form>
            </div>
          </div>
          <div class="informations-container">
            <h2 class="title"><?php echo $row['title']?></h2>
            <p class="sub-title">Location: <?php echo $row['location']?></p><p>Gender: <?php echo $row['gender']?></p>
            <p>Salary:<?php echo $row['salary']?></p>
            <div class="more-information">
              <p class="sub-title">Pincode:<?php echo $row['pincode']?></p>
              </div>
          </div>
        </li>
         <?php } echo "</ul>"; 
        } ?>
    
    </div>
    
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
            <form action='dashboard.php#footer' method="post">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://kit.fontawesome.com/42276ea553.js" crossorigin="anonymous"></script>
</body>
</html>