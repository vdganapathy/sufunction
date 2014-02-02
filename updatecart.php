<?php
require_once('susession.php');
require_once('dbconnect.php');
$pid=$_POST["pid"];
$q=$_POST["q"];
$str=$_POST["str"];
if($str=="update")
{
su_setasso_session("cart",$pid,$q);
}
if($str=="delete")
{
unset($_SESSION['cart'][$pid]);
echo "deleted";
}

$subprice1=0;
$shipping=0;
foreach ($_SESSION['cart'] as $productid => $productq)
 {
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

echo "subprice=".$subprice.";subprice1=".$subprice1.";grandtotal=".$grandtotal;

?>