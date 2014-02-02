<?php
include('sumail.php');
$su_feedback_name = $_POST["su_feedback_name"];
$su_feedback_email = $_POST["su_feedback_email"];
$su_feedback_text = $_POST["su_feedback_text"];
sumail("admin@shoppersultimate.com","SHOPPERSULTIMATE.COM WEBSITE: FEEDBACK","\nName:".$su_feedback_name."\nEmail:".$su_feedback_email."\nFEEDBACK:".$su_feedback_text);
?> 