<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aamdani</title>

    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- NavBar-->
    <?php include "includes/navigation.php"?>
    <!-- Welcome -->
    <div class="d-flex" style="flex-direction: column">
      <div class="abt">
        <br /><br /><br />
        <p>Welcome to Aamdani</p>
        <div class="abt-us">
          <a role="button" class="btn d-flex" href="#aboutus">About Us</a>
        </div>
      </div>
    </div>
    <!--Services tab-->
    <div class="service d-flex" id="services" style="flex-direction: row">
      <div class="s1">
        <p id="tag">Services<br />Provided</p>
      </div>
      <div>
        <svg
          class="d-flex"
          width="1119"
          height="555"
          viewBox="0 0 1119 555"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M332.53 554C-392.3 554 321.729 408.35 160.033 1H1122V554H858.866H332.53Z"
            fill="black"
            fill-opacity="0.78"
            stroke="black"
          />
        </svg>
        <p id="svg">
          We all know the plight of migrant labourers<br />
          post-COVID-19. A lot of the daily-wage-workers<br />
          rushed to their homes in villages when the<br />
          lockdown was instated. Now that these restrictions<br />
          are being lifted, it's a real challenge for them to find<br />
          employment. A lot of old businesses have been shut<br />
          down and many others are running at a reduced<br />
          capacity.
        </p>
      </div>
    </div>
    <p class="help d-flex">WORKERS WE HAVE HELPED SO FAR: 1035+</p>
    <a href="./search.php" class="d-flex justify-content-center" style="text-decoration: none;">Click here to search and apply for jobs</a>

    <!--About us-->
    <div id="aboutus" class="d-flex img-fluid">
      <h1 style="position: relative; margin-top: 130px">About Us</h1>
      <p
        style="
          position: relative;
          margin-top: 470px;
          justify-content: space-between;
          font-size: 28px;
          font-weight: lighter;
          left: 10%;
        "
        id="text"
      >
        Aamdani is a humble website that aims to bring<br />
        employment to the poorest of the poor of our country<br />
        who don't have Whatsapp or Linkedin to search for jobs.
      </p>
    </div>

    <!-- footer-->
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
            <form action='index.php#footer' method="post">
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
            <p>Copyright ?? 2020 Aamdani. All rights reserved</p>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/42276ea553.js" crossorigin="anonymous"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
      integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
  </body>
</html>
