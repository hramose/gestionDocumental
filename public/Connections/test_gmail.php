<?php

include("class.phpmailer.php");
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer();

$body             = file_get_contents('contents.php');

//$body             = preg_replace("[\]",'',$body);

$mail->IsSMTP();
$mail->SMTPAuth = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host = "smtpout.asia.secureserver.net";      // sets GMAIL as the SMTP server
$mail->Port =  80;                   // set the SMTP port for the GMAIL server
echo "<h1>1</h1>";
$mail->Username = "soporte@ecuatask.com";  // GMAIL username
$mail->Password = "soporte";            // GMAIL password
echo "<h1>2</h1>";
$mail->AddReplyTo("soporte@ecuatask.com", "First Last");

$mail->From = "soporte@ecuatask.com";
$mail->FromName = "First Last";

$mail->Subject = "PHPMailer Test Subject via gmail";
echo "<h1>3</h1>";
//$mail->Body       = "Hi,<br>This is the HTML BODY<br>";                      //HTML Body
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->WordWrap = 50; // set word wrap

$mail->MsgHTML($body);

$mail->AddAddress("wcadena@outlook.com", "wagner cadena");

$mail->AddAttachment("images/phpmailer.gif");             // attachment

$mail->IsHTML(true); // send as HTML
echo "<h1>4</h1>";
$mail->SMTPDebug = 1;
echo "<h1>4.2</h1>";
if (!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
echo "<h1>5</h1>";
?>
