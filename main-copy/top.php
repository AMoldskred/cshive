<?php
#ini_set("display_errors", TRUE);
  session_start();

$sh = curl_init( 'https://api.coinhive.com/user/top/?secret=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx&count=3' );
curl_setopt( $sh, CURLOPT_POST, 1);
curl_setopt( $sh, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $sh, CURLOPT_HEADER, 0);
curl_setopt( $sh, CURLOPT_RETURNTRANSFER, 1);


$top = curl_exec( $sh );

echo $top;




 ?>