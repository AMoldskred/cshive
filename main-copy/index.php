  <?php
  #ini_set("display_errors", TRUE);
  session_name('cshive');
  session_set_cookie_params(0, '/', '.cshive.com');
  session_start();
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
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-7429315663199942",
        enable_page_level_ads: true
      });
    </script>
  	 <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
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


        <title>CSHIVE | SkinMining</title>
        <meta name="description" content="Skinmining. You click a button and start mining a cryptocurrency in exchange for free CSGO skins or other items from bitskins. Easy to earn free skins">
        <link rel="canonical" href="https://cshive.com/" />
  </head>
  <body style="display:none;">
  	<nav class="yellow darken-3">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo" style="height:100%"><img src="logo.png" class="responsive-img" style="height:100%;vertical-align: middle;margin-top:0 auto;margin-bottom: 0 auto;"><span style="float:right">CSHIVE</span></a>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
      
    <ul class="right hide-on-med-and-down">
  	<?if(isset($_SESSION['steamid'])) {?>
  		      
             <li><a href="https://chrome.google.com/webstore/detail/cshive/njjlhabnocmgjfhbckogmjhmfjhanhgo" target="_blank" style="">Extension</a></li>
             <li><a href="https://reward.cshive.com">Rewards</a></li>
  	        <li><a href="cashout.php">Cash out</a></li>
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
       <li style="max-width:100%"><a href="#!" id="balance"><i class="material-icons getbal" style="display:inline-flex !important;">monetization_on</i><?echo$_SESSION['balance']?></a></li>
       <li><a href="https://reward.cshive.com">Rewards</a></li>
      <li><a href="cashout.php">Cash out</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?}else{?>
      <li><div class="user-view">
      <a href="#!user"><? echo "<img class='circle'style='display:inline-flex;vertical-align: middle;' src='empty-profile.png'/>"?></a>
      <a href="#!name"><span class="white-text name">Username</span></a>
       <li><a href="#!" id="balance"><i class="material-icons getbal" style="display:inline-flex !important;">monetization_on</i><?echo$_SESSION['balance']?></a></li>
    <li class="center"><? loginbutton("rectangle"); ?></li>
    <?}?>

    <li><div class="divider"></div></li>
  </ul>

    </div>
    </nav>
    
    <div class="row">
      <div class="col s12">
        <h1 class=" center hide" style="color: #0E64A4; font-weight:500;">CRYPTOMINING FOR SKINS</h1>
        <h1 class="center hide" style="color: #0E64A4;font-size: xx-large; font-weight: 500;">CRYPTOMINING FOR SKINS</h1>
      </div>
    </div>

  	<div class="row" style="margin-top: 2vh; margin-bottom:3vh">
  		<div class="col s0 l3">
  		</div>
  			<div class="col s12 l6 center z-depth-3">
  			<div class="row">
  				<div class="col s6" style="color: black">
  				<h4 class="number-label">Hashes/s</h4>
  				<h2 id="hashpersecond">0.0</h2>
  				</div>
  				<div class="col s6" style="color: black">
  					<h4 class="number-label">Total</h4>
  					<h2 id="totalhash">0</h2>
  				</div>
          <div class="row"><div class="col s12">
        <h4 class="center">Intensity</h4>
        <p class="range-field">
            
              <input type="range" value="0.2" id="throttle" min="0" max="1" class="active" step="0.01">
        </p></div></div>
  			</div><div class="divider"></div>
  				<div class="row" style="margin-top: 2vh">
  					<div class="col s12">
  						<a id="startmining"><i class="material-icons medium" style="display:inline-flex;vertical-align: middle;">play_circle_outline</i>Start Mining</a>
  						<a id="stopmining"><i class="material-icons medium" style="display:inline-flex;vertical-align: middle;">pause_circle_outline</i>Stop Mining</a>
  					

  				</div>
  			</div>	
  			   
  			</div>
  		<div class="col s0 l3">
  		</div>
  	</div>
    <div class="divider"></div>
  	<div class="row" style="margin-bottom:10vh; padding:1rem">

        <div class="col s12 m4">
          <div class="center promo">
          	<i class="material-icons">account_circle</i>
          	<p class="promo-caption">Easy to use</p>
          	<p class="light center">CSHive is easy to use. By the click of a button you will be able to build up your balance. We do not require you to watch an ad, look at the page or fill out a survey. Literally all you have to do is to start the miner and leave the tab open in the background. If you do not want to keep the tab open at all times you can use our chromes extension. Which mines in the background without having to keep anything open!</p>
          </div>
        </div>
         <div class="col s12 m4 promo">
          <div class="center">
          	<i class="material-icons">help_outline</i>
          	<p class="promo-caption">What is it?</p>
          	<p class="light center">CSHive makes use of the in-browser crypto-miner called Coin-Hive. By turning the miner on, we utilize power from your CPU to mine for the Monero(XMR) token, and effectivly plugging you into the Monero Blockchain. We trade power from your computer for in-game items. You can run it all day and all night, and easily earning a balance with unused power from your computer.</p>
          </div>
        </div>
        <div class="col s12 m4">
         <div class="center promo">
          	<i class="material-icons">local_atm</i>
          	<p class="promo-caption">How do I get paid?</p>
          	<p class="light center">When you mine, the amount of Hashes per second and total hashes you have made will be shown in the panel. Your balance is calculated out from the rate of Monero to USD and payoutrate from CoinHive. You cash out skins at the "Cash out" page found in the navbar. To make it easier for the user we give you a coupon to <a href="https://bitskins.com/">Bitskins</a>, where you can choose between a huge variety of skins and items from different games. The minimum cashout is $0.1</p>
          </div>
        </div>

      </div>
      <div class="divider"></div>
      <div class="row valign-wrapper">
        <div class="hide-on-med-and-down col l1"></div>
        <div class="col s12 l4">
          <p class="flow-text center">
            The CSHIVE extension makes it easy for you to constantly mine in the background, without even keeping the website open. You can easily toggle it on and of in a little popup window top left in your browser. Additionally, you can toggle an autostartfunction that starts the mining whenever you start you starts your computer. 
          </p>
        </div>
        <div class="col s12 l7 hide-on-med-and-down">
          <img class="responsive-img" style="cursor:pointer;" src="cshive1280.png" onclick="window.open('https://chrome.google.com/webstore/detail/cshive/njjlhabnocmgjfhbckogmjhmfjhanhgo','_blank')"/>
        </div>
        
      </div>
      <div class="row" style="text-align:center">
      <a class="waves-effect waves-light btn-large" target="_blank" href="https://chrome.google.com/webstore/detail/cshive/njjlhabnocmgjfhbckogmjhmfjhanhgo" style="background-color:#2576f9 !important;"><i class="material-icons right">get_app</i>Download here</a>
    </div>
      <div class="divider"></div>
      <div class="row" style="text-align:center">
        <div class="col s12 m8 push-m2">
          <h1 class="center" style="color: #f9a825 !important">TOP MINERS</h1>
        <table>
          <thead>
          <tr>
              <th>#</th>
              <th>Steamid</th>
              <th>Total hashes</th>
          </tr>
        </thead>
          <tbody>
            <tr id="number1" style="cursor:pointer">
              <td><img class="responsive-img" id="1img" src="1.png" style="width:2rem"/></td>
              <td id="1name">Name1</td>
              <td id="1hashes">1234</td>
            </tr>
            <tr id="number2" style="cursor:pointer">
              <td><img class="responsive-img" id="2img" src="2.png" style="width:2rem"/></td>
              <td id="2name">Name2</td>
              <td id="2hashes">1234</td>
            </tr>
            <tr id="number3" style="cursor:pointer">
              <td><img class="responsive-img" id="3img" src="3.png" style="width:2rem"/></td>
              <td id="3name">Name3</td>
              <td id="3hashes">1234</td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
      <div class="divider"></div>
      <div class="container promo">
        <i class="material-icons center">personal_video</i>
      <div class="video-container z-depth-5" style="margin-bottom:10%;">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/9hKUCkMzLcg?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>
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
                    <li><a class="grey-text text-lighten-3" href="cashout.php">Cash out</a></li>
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
        <script src="https://coinhive.com/lib/coinhive.min.js"></script>
        <script src="js.php"></script>
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
      color:#0E64A4 !important;
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
    input[type=range]::-webkit-slider-thumb {
    background-color: #f9a825;
    }
    input[type=range]::-moz-range-thumb {
      background-color: #f9a825;
    }
    input[type=range]::-ms-thumb {
      background-color: #f9a825;
    }

    /***** These are to edit the thumb and the text inside the thumb *****/
    input[type=range] + .thumb {
      background-color: #f9a825;
    }
    input[type=range] + .thumb.active .value {
      color: white;
    }
    	</style>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106379655-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-106379655-4');


  window.addEventListener("offline", function(){

    window.location = "/offline.html";
    }, false);
</script>

<?
$url = '/offline.html';
$img = '/img/ms-icon-310x310.png';
if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 720 ))) {
   // Cache file is less than five minutes old. 
   // Don't bother refreshing, just use the file as-is.
   $file = file_get_contents($cache_file);
   $image = file_get_contents($cache_img);
} else {
   // Our cache is out-of-date, so load the data from our remote server,
   // and also save it over our cache for next time.
   $file = file_get_contents($url);
   $image = file_get_contents($img);
   file_put_contents($cache_file, $file, LOCK_EX);
   file_put_contents($cache_img, $image, LOCK_EX);
}
?>
  </body>
  </html>