<?php
#ini_set("display_errors", TRUE);
session_start();

  require 'steamauth/steamauth.php';
  require 'steamauth/userInfo.php';
require_once('otphp/lib/otphp.php');
$totp = new \OTPHP\TOTP('xxxxxxxxxxxx');
$auth = $totp->now();






if(isset($_POST['amount'])){
$amount = $_POST['amount'];

if($amount > $_SESSION['balance']){
	echo 'Withdraw amount exceeds balance';
}else{
	#Withdraw
	$wurl = 'https://api.coinhive.com/user/withdraw/';
	$wvars = 'secret=&name=' . $_SESSION['steamid'] .'&amount='.$amount/$_SESSION['rate'];

$wh = curl_init( $url );
curl_setopt( $wh, CURLOPT_POST, 1);
curl_setopt( $wh, CURLOPT_POSTFIELDS, $wvars);
curl_setopt( $wh, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $wh, CURLOPT_HEADER, 0);
curl_setopt( $wh, CURLOPT_RETURNTRANSFER, 1);

$res = curl_exec( $wh );
if($res['success']){

$url = 'https://bitskins.com/api/v1/create_coupons/';
$myvars = 'api_key=YOUR_API_KEY_HERE&code=' . $auth.'&amount='.$amount.'&quantity=1';

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
$response = json_decode($response, true);
if($response['status'] == 'fail'){
	echo 'Please contact a mod, something went wrong';
}else{
echo $response['data']['coupon_codes'][0];
}
curl_close($ch);
}else{
	echo 'Withdrawal from Coinhive failed';
}
//Close the cURL handle.
curl_close($wh);

}

}else{
	echo 'Something went wrong, please contact a mod';
}


exit();
?>