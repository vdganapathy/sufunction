<?php
require_once('susession.php');
include('sumail.php');
$guestemail=$_POST["gstemail"];
$code=md5(mt_rand());

su_set_session("gstcode",$code);
	
if (sumail($guestemail, 'Conformation Code', 'Your Code:'.$code))
{
	echo "mail sent";

}




?>