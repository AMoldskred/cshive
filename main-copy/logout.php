

<html>

<?php
  session_name('cshive');
  session_set_cookie_params(0, '/', '.cshive.com');
	session_start();
	unset($_SESSION['steamid']);
	unset($_SESSION['steam_uptodate']);
  session_set_cookie_params(0);
  session_destroy();
  session_write_close();
?>
<head>
   <meta name="mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/img/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
        <link rel="manifest" href="/img/manifest.json">
        <meta name="msapplication-TileColor" content="#f9a825">
        <meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
        <meta name="theme-color" content="#f9a825">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">

<title>CSHIVE | Logout</title>  
</head>

<body>
<img src="/img/ms-icon-310x310.png" class="pulse">
<style type="text/css">
img {
   position: absolute;
   top: 50%;
   left: 50%;
   width: 310px;
   height: 310px;
   margin-top: -155px !important; /* Half the height */
   margin-left: -155px !important; /* Half the width */
}
  .pulse {
  animation: pulse 8s infinite;
  margin: 0 auto;
  display: table;
  margin-top: 50px;
  animation-direction: alternate;
  -webkit-animation-name: pulse;
  animation-name: pulse;
}

@-webkit-keyframes pulse {
  0% {
    -webkit-transform: scale(1);
  }
  50% {
    -webkit-transform: scale(1.5);
  }
  100% {
    -webkit-transform: scale(1);
  }
}

@keyframes pulse {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}
</style>
<script type="text/javascript">
  setTimeout(function(){
    window.location = '/';
  }, 3000)
</script>
</body>
</html>