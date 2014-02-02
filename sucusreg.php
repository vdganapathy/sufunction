<?php
require_once('dbconnect.php');
//require_once('susession.php');


$suip=$_SERVER["REMOTE_ADDR"];

$suagent=$_SERVER['HTTP_USER_AGENT'];


$email=$_GET["regparaemail"];

$pass=(md5($_GET['regparapass']));





$result=mysql_query("SELECT id FROM sucustomer WHERE id=(select max(id) from sucustomer)");

$row = mysql_fetch_array($result);

$sucusid = $row['id'];

$sucusid = $sucusid + 1;


$sql=mysql_query("INSERT INTO sucustomer(id,email,password,regdate,ip,agent) VALUES('$sucusid','$email','$pass',NOW(),'$suip','$suagent')");


?>