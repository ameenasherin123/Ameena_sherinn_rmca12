
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
 $eemail=$_GET['email'];
 echo $eemail;
require 'Exception.php'; 
require 'PHPMailer.php'; 
require 'SMTP.php'; 
$conn=mysqli_connect("localhost","root","","realtor");
//$sql=mysqli_query($conn,"SELECT `cocontent` FROM `comment_tbl` WHERE `coemail`='$eemail'");
//$rows=mysqli_fetch_array($sql);
//$pass=$rows['cocontent'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'realtor545@gmail.com';                     //SMTP username
    $mail->Password   = 'amvlemrsuriyotnl';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('realtor545@gmail.com', 'Realtor');
    $mail->addAddress($eemail);     //Add a recipient
  //  $mail->addAddress('ellen@example.com');               //Name is optional
  //  $mail->addReplyTo('info@example.com', 'Information');
  //  $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
   /// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'You Are Approved';
    $mail->Body    = 'You can login using your Login Credentials..';
    $mail->AltBody = 'Thanks For your Interest';

    $mail->send();
    
    echo "<script>alert('Message has been Sent');window.location.href='../manage-agents.php';</script>";
   
} catch (Exception $e) {
   // echo $eemail;
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}