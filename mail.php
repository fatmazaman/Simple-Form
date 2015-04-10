<?php
session_start();

// Email address verification

function isEmail($email) {
    return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
}

if($_GET) {

    
    $fname= $_GET['fname'];
    $lname = $_GET['lname'];
    $email = $_GET['email'];
    $nickname = array();
    $nickname[] = $_GET['nickname'];
    if(!empty($_GET['nickname_1'])){
      $nickname[] = $_GET['nickname_1'];    
    }
    if(!empty($_GET['nickname_2'])){
      $nickname[] = $_GET['nickname_1'];    
    }
    if(!empty($_GET['nickname_3'])){
      $nickname[] = $_GET['nickname_1'];    
    }
    if(!empty($_GET['nickname_4'])){
      $nickname[] = $_GET['nickname_1'];    
    }
    if(!empty($_GET['nickname_5'])){
      $nickname[] = $_GET['nickname_5'];    
    }
    // put comma in between
    $nickname = implode(', ', $nickname);
    // $nickname[] = $_GET['nickname_2'];
    // $nickname[] = $_GET['nickname_3'];
    // $nickname[] = $_GET['nickname_4'];
    // $nickname[] = $_GET['nickname_5'];

    
// Enter the email where you want to receive the notification
    $emailTo = $email;
    $emailFrom = 'fatma302@gmail.com';

    if(!isEmail($emailTo)) {
        $array = array();
        $array['valid'] = 0;
        $array['message'] = 'Insert a valid email address!';
        echo json_encode($array);
    }
    else {
// SEND MAIL USING MANDRILL
      
// require 'class.phpmailer.php';
require './PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
// $mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mandrillapp.com';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'fatma302@gmail.com';                // SMTP username
$mail->Password = 'T2DDE2ghJFeo96ttOT6aLA';                  // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'fatma302@gmail.com';
$mail->FromName = 'Fatma Zaman';
$mail->AddAddress("".$emailTo."", "".$fname."");  // Add a recipient


$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is your information';
$mail->Body    = "You have filled these information\n\n First Name: " . $fname . 
                 "\n  Last Name:" .$lname . "\n  Email:  " . $email . "\n Nick name: " . $nickname . "";
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   $_SESSION['flash'] = false;
   exit;
}

echo 'Message has been sent';
$_SESSION['flash'] = true;
header("location:./");

}
}

        // Send an email PHP X-mailer default way
  // $subject = 'Your Information';
  // $body = "You have filled these information\n\n First Name: " . $fname . "\n Last Name:" .
  // $lname . "\n Email:" . $email . "\n Nick name:" . $nickname . "";

  // $headers = "From: ".$emailFrom."<" . $emailFrom . ">" . "\r\n" .
  //   "Reply-To: " . $emailFrom ."\r\n". 'X-Mailer: PHP/' . phpversion();
  // mail($emailTo, $subject, $body, $headers);
  //   $array = array();
  //       $array['valid'] = 1;
  //       $array['message'] = 'Thanks';
  //       echo json_encode($array);
  //   }
  //    header("location:./");
?>