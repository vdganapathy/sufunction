<?php
require_once('dbconnect.php');
require_once('susession.php');
$tq=0;
$subprice1=0;
$shipping=0;
foreach ($_SESSION['cart'] as $productid => $productq)
 {
$tq=$tq+$productq;
$sql="SELECT * FROM product,product_description WHERE product.product_id='$productid' AND product_description.product_id='$productid'";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result))
  {
  $name=$row['name'];
  $model=$row['model'];
  $image=$row['image'];
  $price=$row['price'];
 
  }
$subprice=$price*$productq;
$subprice1=$subprice1+$subprice;
$grandtotal=$subprice1+$shipping;
 }
su_set_session("subprice",$subprice);
su_set_session("subprice1",$subprice1);
su_set_session("grandtotal",$grandtotal);

//echo "tq=".$tq.";subprice=".$subprice.";subprice1=".$subprice1.";grandtotal=".$grandtotal;


?>