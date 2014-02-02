<?php
require_once('dbconnect.php');
require_once('susession.php');
require_once('sumail.php');
$suemail = $_POST["q"];
$result = mysql_query("SELECT name,email FROM sucustomer WHERE email = '$suemail'");

  $count = mysql_num_rows($result);
  if($count==0)
  {
 echo "The Email-id does not exist.";
  }
  else {
  	$randpass=mt_rand();
	$supassword=md5($randpass);
	
	$updatemailpass = mysql_query("UPDATE sucustomer SET password='$supassword' where email = '$suemail'");
	
	
if (sumail($suemail,'Your New Password.......', 'New password:'.$randpass))
{
	echo "mail sent";

	
}
  }
?>