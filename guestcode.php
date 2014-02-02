<?php
require_once('dbconnect.php');
require_once('susession.php');
$gstcode = $_POST["gstcode"];
if($gstcode==$_SESSION['gstcode'])
{
echo "1";
}
else
{
echo "0";
}


?>
