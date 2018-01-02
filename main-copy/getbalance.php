<?php
#ini_set("display_errors", TRUE);
  session_name('cshive');
  session_start();
  unset($_SESSION['balance']);

$sh = curl_init( 'https://api.coinhive.com/stats/payout/?secret=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx' );
curl_setopt( $sh, CURLOPT_POST, 1);
curl_setopt( $sh, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $sh, CURLOPT_HEADER, 0);
curl_setopt( $sh, CURLOPT_RETURNTRANSFER, 1);

$stats = curl_exec( $sh );
$stats = json_decode($stats, true);
$rate = $stats['payoutPer1MHashes']/2000000*0.7;
$_SESSION['rate'] = $rate*$stats['xmrToUsd'];


 $ch = curl_init();
 
//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, "https://api.coinhive.com/user/balance?name=".$_SESSION['steamid']."&secret=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
 
//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 
//Execute the request.
$data = curl_exec($ch);
$data = json_decode($data, true);

if($_SESSION['first']){
$_SESSION['balance'] = sprintf('%.6f', $data['balance']*$_SESSION['rate']);
$_SESSION['first'] = false;
}else{
$_SESSION['balance'] = sprintf('%.6f', $data['balance']*$_SESSION['rate']);	
echo $_SESSION['balance'];
}



		

//Close the cURL handle.
curl_close($ch);
  ?>