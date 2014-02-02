<?
require_once('susession.php');
require_once('pricecalc.php');
function getorderid()
{
$orderid = date("Ymdhis");

$orderid .= rand(0,9);

return $orderid;
}

su_set_session("supaymethod",$_POST['supaymethod']);
su_set_session("shipname",$_POST['sname']);
su_set_session("shipaddress",$_POST['saddress']);
su_set_session("shipcity",$_POST['scity']);
su_set_session("shipstate",$_POST['sstate']);
su_set_session("shipcountry",$_POST['scountry']);
su_set_session("shippostal_code",$_POST['spostal_code']);
su_set_session("shipphone",$_POST['sphone']);


$reference_no=getorderid();
su_set_session("orderid",$reference_no);
$hash = "8fd532c128b7ec4dda67cbcb44d3cc9a"."|8908"."|".$_SESSION['grandtotal']."|".$reference_no."|http://shoppersultimate.com/sufunction/response.php?DR={DR}"."|TEST";

$secure_hash = md5($hash);


?>

<table cellpadding="5">
<tr><td>Items</td><td>:</td><td id="su_c_tq"><? echo  $tq; ?></td></tr>
<tr><td>Sub Total</td><td>:</td><td id="su_c_subt"><? echo  $grandtotal; ?></td></tr>
<tr><td>Shipping / Delivery</td><td>:</td><td id="su_c_sh">0.00</td></tr>
<tr><td>Payment Method</td><td>:</td><td id="su_c_paym"><? echo  $_SESSION['supaymethod']; ?></td></tr>
<tr><td>Total</td><td>:</td><td id="su_c_tot"><? echo  $grandtotal; ?></td></tr>
</table>

<?php

if ($_SESSION['supaymethod']=="cod") {

?>

<form  method="post" action="sufunction/cod.php" name="frmTransaction" id="frmTransaction">

<?php	
} else {
	
	?>
	<form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction">
<?php	
}


?>

<input name="account_id" type="hidden" value="8908">
<input name="return_url" type="hidden" size="60" value="http://shoppersultimate.com/sufunction/response.php?DR={DR}" />
<input name="mode" type="hidden" size="60" value="TEST" />
<input name="reference_no" type="hidden" value="<? echo  $reference_no; ?>" />
<input name="amount" type="hidden" value="<? echo $_SESSION['grandtotal']; ?>"/>
<input name="description" type="hidden" value="This is the test description" /> 
<input name="name" type="hidden" maxlength="255" value="<? echo $_POST['name'] ?>" />
<input name="address" type="hidden" maxlength="255" value="<? echo $_POST['address'] ?>" />
<input name="city" type="hidden" maxlength="255" value="<? echo $_POST['city'] ?>" />
<input name="state" type="hidden" maxlength="255" value="<? echo $_POST['state'] ?>" />
<input name="postal_code" type="hidden" maxlength="255" value="<? echo $_POST['postal_code'] ?>" />
<input name="country" type="hidden" maxlength="255" value="<? echo $_POST['country'] ?>" />
<input name="phone" type="hidden" maxlength="255" value="<? echo $_POST['phone'] ?>" />
<input name="email" type="hidden" size="60" value="<? echo $_POST['email']?>" />
<input name="secure_hash" type="hidden" size="60" value="<? echo $secure_hash;?>" />
<input type="submit" value="Pay" style="background: #d2ff52; /* Old browsers */
background: -moz-linear-gradient(top,  #d2ff52 0%, #91e842 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#d2ff52), color-stop(100%,#91e842)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #d2ff52 0%,#91e842 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #d2ff52 0%,#91e842 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #d2ff52 0%,#91e842 100%); /* IE10+ */
background: linear-gradient(to bottom,  #d2ff52 0%,#91e842 100%); /* W3C */
width:200px;color:black;" >
</form>