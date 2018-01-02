  <?php
  #ini_set("display_errors", TRUE);
  session_name('cshive');
  session_set_cookie_params(0, '/', '.cshive.com');
  require 'steamauth/steamauth.php';
  require 'steamauth/userInfo.php';

  if(!isset($_SESSION['steamid'])) {

  }  else {
      include ('steamauth/userInfo.php'); //To access the $steamprofile array
      $_SESSION['first'] = true;
       include ('getbalance.php');
      //Protected content
      $id = $_SESSION['steamid'];

  } 
  ?>
  <html>
  <head>
  	 <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
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



        <title>CSHIVE | Get Skins</title>
        <meta name="description" content="Skinmining. You click a button and start mining a cryptocurrency in exchange for free CSGO skins or other items from bitskins. Easy to earn free skins">
  </head>
  <body>
  	<nav class="yellow darken-3">
      <div class="nav-wrapper">
        <a href="/" class="brand-logo" style="height:100%"><img src="logo.png" class="responsive-img" style="height:100%"><span style="float:right">CSHIVE</span></a>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      
    <ul class="right hide-on-med-and-down">
    <?if(isset($_SESSION['steamid'])) {?>
      
            <li><a href="index.php">Home</a></li>
            <li><a href="#!" id="balance"><i class="material-icons getbal" style="display:inline-flex !important;">monetization_on</i><?echo$_SESSION['balance']?></a></li>
            <li><a href="#!"><?=$steamprofile['personaname'];?></a></li>
            <li ><? echo "<img class='circle'style='display:inline-flex;vertical-align: middle;' src='".$steamprofile['avatar']."'/>"?></li>
            
            <li><a href="logout.php">Logout</a></li>

    <?}else{?>
    <li class="valign-wrapper" style="height:100%"><? loginbutton("rectangle"); ?></li>
    <?}?>
    </ul>
    <ul id="slide-out" class="side-nav hide-on-large yellow darken-3 center">
      <?if(isset($_SESSION['steamid'])) {?>
    <li><div class="user-view">
      <a href="#!user"><? echo "<img class='circle'style='display:inline-flex;vertical-align: middle;' src='".$steamprofile['avatar']."'/>"?></a>
      <a href="#!name"><span class="white-text name"><?=$steamprofile['personaname'];?></span></a>
       <li><a href="#!" id="balance"><i class="material-icons getbal" style="display:inline-flex !important;">monetization_on</i><?echo$_SESSION['balance']?></a></li>
      <li><a href="index.php">Home</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?}else{?>
      <li><div class="user-view">
      <a href="#!user"><? echo "<img class='circle'style='display:inline-flex;vertical-align: middle;' src='empty-profile.png'/>"?></a>
      <a href="#!name"><span class="white-text name"><?=$steamprofile['personaname'];?></span></a>
       <li><a href="#!" id="balance"><i class="material-icons getbal" style="display:inline-flex !important;">monetization_on</i><?echo$_SESSION['balance']?></a></li>
      <li><a href="cashout.php">Cash out</a></li>
    <li class="center"><? loginbutton("rectangle"); ?></li>
    <?}?>

    <li><div class="divider"></div></li>
  </ul>

    </div>
    </nav>



  	<div class="row valign-wrapper" style="min-height:90vh">
      
      <div class="col s12 l8 z-depth-3 offset-l2">
        <h2 class="center">WITHDRAW BALANCE</h2>
        <div class="row">
        <div class="col s12 m11">
        <p class="light-text"><i>When you withdraw you will be prompted a popup that contains your coupon code for <a href="https://bitskins.com/">Bitskins</a>. Please remember to write down your code when shown or just click it to copy. It will not be accessible after popup is closed.</i><br>
        </p>
        <h5>Rules for Withrawl</h5>
        <div class="divider"></div>
        <div class="row cetner">
          <div class="col s12 m4"><b>Minimum amount:</b><i>$0.1</i></div>
          <div class="col s12 m4"><b>Maximum amount:</b><i>Your balance</i></div>
          <div class="col s12 m4"><b>Errors?:</b><a href="mailto:moldskredandreas1@gmail.com">Contact us</a></div>
        </div>
        </div>
        <div class="col m1 hide-on-small-only"><img src="bitskins.png" onclick="window.open('https://bitskins.com/', '_blank')" class="responsive-img"/></div>
      </div>
         <div class="row">
        <div class="input-field col m6 s12">
          <i class="material-icons prefix">account_circle</i>
          <input disabled id="icon_prefix" type="number">
          <label for="icon_prefix"><?echo 'ID: '.$_SESSION['steamid']?></label>
        </div>
      
        <div class="input-field col m6 s12">
          <i class="material-icons prefix">monetization_on</i>
          <input id="bal" disabled>
          <label for="bal"><?echo 'Balance: '.$_SESSION['balance']?></label>
        </div>
      </div>

      <div class="row">
       
        <div class="input-field col m8 s12">
          <i class="material-icons prefix">local_atm</i>
          <input id="amount" type="number" min="0.1" <?echo 'max="'.$_SESSION['balance'].'"'?> class="validate">
          <label for="amount">Amount to withdraw</label>
        </div>
        <div class="col s12 m4">
          <a id="withdraw" class="waves-effect waves-light btn-large yellow darken-3"><i class="material-icons right">send</i>withdraw</a>
        </div>
      </div>
      
      <div class="col s2"></div>

  	</div></div>




   <footer class="page-footer yellow darken-3">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">More</h5>
                  <p class="grey-text text-lighten-4">CSHive is based upon a miner from <i>CoinHive</i>. We offer a solution where instead of working by yourself for months to reach the minimum cashout amount, you get to cash out skins for a reasonable price by running the miner and not having to deal with cryptocurrencies. You skip all the hassle with converting Monero to usd and then usd to skin, and just earn right away.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h5 class="white-text">Pages:</h5>
                  <ul>
                    <li><a class="grey-text text-lighten-3" href="index.php">Mining page</a></li>
                    <li><a class="grey-text text-lighten-3" href="https://chrome.google.com/webstore/detail/cshive/njjlhabnocmgjfhbckogmjhmfjhanhgo">Extension</a></li>
                   
  					<?if(isset($_SESSION['steamid'])) {?>
                    <li><a class="grey-text text-lighten-3" href="logout.php">Logout</a></li>
                    <li><a class="grey-text text-lighten-3" href="https://coin-hive.com/">CoinHive website</a></li>
                    <? }else{?><li><a class="grey-text text-lighten-3" href=""><?php loginbutton();?></a></li>
                    
                    <?}?>
                   
               </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
              ©  CSHIVE 2017
              <a class="grey-text text-lighten-4 right" href="mailto:moldskredandreas1@gmail.com">Contact Moderator</a>
              </div>
            </div>
          </footer>


    
  	 <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="materialize.min.js"></script>
        <script src="cashoutjs.php"></script>
        <script src="dist/clipboard.min.js"></script>
    	<style type="text/css">
      body{
        
      }

    	.promo i {
      margin: 40px 0;
      color: #f9a825 !important;
      font-size: 7rem;
      display: block;
  	}
  	h4.number-label {
      margin: 16px 0 0 0;
  	}
  	#stopmining{
  		display:none;
  	}
  	#startmining, #stopmining{
  		font-size:2rem !important;
  		line-height:1.5rem !important;
  		cursor:pointer;
  	}
  	.material-icons{
      display: inline-flex;
      vertical-align: top;
  	}
  	.brand-logo{
  		left:2vw;
  	}
  	.promo-caption {
      font-size: 1.7rem;
      font-weight: 500;
      margin-top: 5px;
      margin-bottom: 0;
  	}
    	</style>
       <script>
        window.addEventListener("offline", function(){

    window.location = "/offline.html";
    }, false);
</script>
  </body>
  </html>