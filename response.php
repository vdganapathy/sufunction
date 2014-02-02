<?php
require_once('dbconnect.php');
require_once('susession.php');


$suip=$_SERVER["REMOTE_ADDR"];
$suagent=$_SERVER['HTTP_USER_AGENT'];
$secret_key = "8fd532c128b7ec4dda67cbcb44d3cc9a";


if(isset($_SESSION['sucustid']))
{
$sucusid=$_SESSION['sucustid'];
}
else
{
$sucusid=0;
}



if(isset($_GET['DR'])) {
	 require('Rc43.php');
	 $DR = preg_replace("/\s/","+",$_GET['DR']);

	 $rc4 = new Crypt_RC4($secret_key);
 	 $QueryString = base64_decode($DR);
	 $rc4->decrypt($QueryString);
	 $QueryString = split('&',$QueryString);

	 $response = array();
	 foreach($QueryString as $param){
	 	$param = split('=',$param);
		$response[$param[0]] = urldecode($param[1]);
	 }
}


$sql="INSERT INTO suorder(
customer_id,
customer_name,
customer_phone,
customer_email,
customer_address,
customer_city,
customer_state,
customer_country,
customer_pincode,
ship_name,
ship_phone,
ship_address,
ship_city,
ship_state,
ship_country,
ship_pincode,
payment_method,
status,
date,
ip,
response_code,
response_message,
payment_id,
m_ref_no,
amount,
mode,
description,
isflagged,
transaction_id,
uagent
) 
VALUES(
'$sucusid',
'$response[BillingName]',
'$response[BillingPhone]',
'$response[BillingEmail]',
'$response[BillingAddress]',
'$response[BillingCity]',
'$response[BillingState]',
'$response[BillingCountry]',
'$response[BillingPostalCode]',
'$_SESSION[shipname]',
'$_SESSION[shipphone]',
'$_SESSION[shipaddress]',
'$_SESSION[shipcity]',
'$_SESSION[shipstate]',
'$_SESSION[shipcountry]',
'$_SESSION[shippostal_code]',
'$response[PaymentMethod]',
'Pending',
'$response[DateCreated]',
'$suip',
'$response[ResponseCode]',
'$response[ResponseMessage]',
'$response[PaymentID]',
'$response[MerchantRefNo]',
'$response[Amount]',
'$response[Mode]',
'$response[Description]',
'$response[IsFlagged]', 	
'$response[TransactionID]',
'$suagent'
)";


if($_SESSION['orderid']==$response['MerchantRefNo'])
{

if (!mysql_query($sql))
{
die('Error: ' . mysql_error());
}
}

session_destroy();
header('Location: http://shoppersultimate.com/index.php?route=sale/response');

 ?>
