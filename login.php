<?php
require_once('dbconnect.php');
require_once('susession.php');
$email=$_POST["e"];
$pass=$_POST["p"];
$pass=md5($pass);
$email=stripslashes($email);
$pass=stripslashes($pass);
$email=mysql_real_escape_string($email);
$pass=mysql_real_escape_string($pass);

$sql="SELECT * FROM sucustomer WHERE email='$email' and password='$pass'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
while($row = mysql_fetch_array($result))
  {
  $sucustid=$row['id'];
  $sucustname=$row['name'];
  }
  su_set_session("sucustname",$sucustname);
  su_set_session("sucustid",$sucustid);
echo "name=\"".$sucustname."\";id=".$sucustid.";msg=\"Login Success.\"";
}
else
{
echo "Invalid Account Selection.";
}
?>