<?php
require_once('dbconnect.php');
$id=$_POST["id"];
$sql="SELECT * FROM sucustomer WHERE id='$id'";
$result=mysql_query($sql);


while($row = mysql_fetch_array($result))
  {
  echo  "id=".$row['id'];
  echo ";name='".$row['name']."'";
  echo ";address='".$row['address']."'";
echo   ";city='".$row['city']."'";
echo   ";state='".$row['state']."'";
echo   ";country='".$row['country']."'";
echo   ";pincode=".$row['pincode'];
echo   ";phone='".$row['phone']."'";
echo   ";email='".$row['email']."'";
  }



?>