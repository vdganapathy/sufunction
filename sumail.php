<?php
include("class.phpmailer.php");
include("class.smtp.php");
function sumail($to,$subject,$body)
{

$mail             = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.zoho.com";      // sets zoho as the SMTP server
$mail->Port       = 465;                   // set the SMTP port
$mail->Username   = "admin@shoppersultimate.com";  // zoho username
$mail->Password   = "coolRs123";            // zoho password
$mail->From       = "admin@shoppersultimate.com";
$mail->FromName   = "shoppersultimate.com";
$mail->Subject    = $subject;
$mail->WordWrap   = 50; // set word wrap
$mail->MsgHTML($body);
$mail->AddAddress($to);
$mail->IsHTML(true); // send as HTML
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message has been sent";
}
}//function closing
?>
