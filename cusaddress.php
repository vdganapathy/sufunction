<?php
require_once('dbconnect.php');
//require_once('susession.php');

$sucusinsertname=$_GET["ajxcusname"];
$sucusinsertadd=$_GET["ajxcusadd"];
$sucusinsertcity=$_GET["ajxcuscity"];
$sucusinsertstate=$_GET["ajxcusstate"];
$sucusinsertcountry=$_GET["ajxcuscountry"];
$sucusinsertpincode=$_GET["ajxcuspincode"];
$sucusinsertphone=$_GET["ajxcusphone"];



$sql = 'INSERT INTO address (firstname, address_1, city, postcode,) VALUES ("'.$sucusinsertname.'","'.$sucusinsertadd.'", "'.$sucusinsertcity.'", "'.$sucusinsertpincode.'" )';
 
if (!mysql_query($sql,$bd))
{
die('Error: ' . mysql_error());
}

 
mysql_close($db);


?>