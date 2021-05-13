<?php include "./db.php"; ?>
<?php session_start(); ?>
<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

require_once "../vendor/autoload.php";
if(isset($_POST['job_apply'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $contact_number = $_POST['contact'];
    $job_id = $_SESSION['job_id'];
    $id = uniqid();

    $query = "INSERT into applicant (applicant_id,job_id,name,age,city,contact) VALUES ('$id','$job_id','$name','$age','$city','$contact_number')";
    $result = mysqli_query($connection,$query);

    if($result){
          header("Location: ../response.php");
        $query = "SELECT * from job where id = '$job_id' ";
        $result = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($result)){
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

    $mail->addAddress($row['email']);

    $mail->isHTML(true);

    $mail->Subject = "Job Update";
    $title = $row['title'];
    $mail->Body = "You have a new applicant for the job <b>$title</b>. Please check your dashboard for the same.<br><br> 
                    <table style='width:100%;'><tr><th style='font-weight: light;background: blue;box-sizing: border-box;border: 1px solid snow;text-align: center;color: snow;'>Name</th>
                    <th style='font-weight: light;background: blue;box-sizing: border-box;border: 1px solid snow;text-align: center;color: snow;'>Age</th>
                    <th style='font-weight: light;background: blue;box-sizing: border-box;border: 1px solid snow;text-align: center;color: snow;'>City</th>
                    <th style='font-weight: light;background: blue;box-sizing: border-box;border: 1px solid snow;text-align: center;color: snow;'>Contact</th>
                    </tr>
                    <tr>
                    <td style='background: blue;box-sizing: border-box;border: 1px solid snow;text-align: center;color: snow;'>$name</td>
                    <td style='background: blue;box-sizing: border-box;border: 1px solid snow;text-align: center;color: snow;'>$age</td>
                    <td style='background: blue;box-sizing: border-box;border: 1px solid snow;text-align: center;color: snow;'>$city</td>
                    <td style='background: blue;box-sizing: border-box;border: 1px solid snow;text-align: center;color: snow;'>$contact_number</td>
                    </tr>
                    </table><br><br>To your success,<br><b>Team Aamdani</b>";


    try {
       $mail->send();
    } catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
        }
        
      
    }
}
?>