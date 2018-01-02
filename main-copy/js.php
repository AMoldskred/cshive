<?php header("Content-type: application/javascript"); 
require 'steamauth/steamauth.php';
require 'steamauth/userInfo.php';

?>
 $(document).ready(function(){
 $("body").fadeIn(750)
 function abbreviateNumber(value) {
    var newValue = value;
    if (value >= 1000) {
        var suffixes = ["", "K", "M", "B","T"];
        var suffixNum = Math.floor( (""+value).length/3 );
        var shortValue = '';
        for (var precision = 2; precision >= 1; precision--) {
            shortValue = parseFloat( (suffixNum != 0 ? (value / Math.pow(1000,suffixNum) ) : value).toPrecision(precision));
            var dotLessShortValue = (shortValue + '').replace(/[^a-zA-Z 0-9]+/g,'');
            if (dotLessShortValue.length <= 2) { break; }
        }
        if (shortValue % 1 != 0)  shortNum = shortValue.toFixed(1);
        newValue = shortValue+suffixes[suffixNum];
    }
    return newValue;
}
$.get('top.php',function(top){
  $top = JSON.parse(top);
  for (i = 0; i < $top.users.length; i++) { 
   console.log($top.users[i].name);
    $('#'+(i+1)+'name').html($top.users[i].name)
    $('#'+(i+1)+'hashes').html($top.users[i].total)
  }
})
$('#number1').on('click', function(){
    window.open('https://steamcommunity.com/profiles/'+$top.users[0].name,'_blank')
    })
    $('#number2').on('click', function(){
    window.open('https://steamcommunity.com/profiles/'+$top.users[1].name,'_blank')
    })
    $('#number3').on('click', function(){
    window.open('https://steamcommunity.com/profiles/'+$top.users[2].name,'_blank')
    })
 $(".button-collapse").sideNav();
      $('.modal').modal();
  		$miner = new CoinHive.User(<?echo "'".$_SESSION['sitekey']."','".$_SESSION['steamid']."'"?>, {
  					threads: 4,
  					autoThreads: true,
  					throttle: 0.8,
  					forceASMJS: false
  					})
      	

      	$('#startmining').on('click', function(){
          console.log('startmining')
      	$('#startmining').hide();
  		$('#stopmining').show();
      		
  		$miner.start();
  		setInterval(function() {
  		$('#hashpersecond').html(parseInt($miner.getHashesPerSecond()));
  		$('#totalhash').html(abbreviateNumber(parseInt($miner.getTotalHashes())));
  	   }, 1000);
      	})

      	$('#stopmining').on('click', function(){
          console.log('stopmining')
      		$miner.stop();
      		$('#startmining').show();
  			$('#stopmining').hide();

      	})

  		$miner.on('error', function(params) {
  			if (params.error !== 'connection_error') {
  				Materialize.toast(params.error, 5000)
  			}else{
  				Materialize.toast('Error connecting, please try again', 5000)
  			}
  			$miner.stop();
      		$('#startmining').show();
  			$('#stopmining').hide();
  		});


setInterval(function(){
$.ajax({url: "getbalance.php", success: function(data){
$( "#balance" ).html( '<i class="material-icons getbal" style="display:inline-flex !important">monetization_on</i>'+data );
  console.log(data)

}});  
},10000);

  });
  

$('#throttle').change(function(){
      var throttle = 1-$('#throttle').val();
      console.log('Throttle set to:'+throttle+'/1');
      $miner.setThrottle(throttle);
      })

  if (typeof CoinHive == 'undefined') {
    document.write(unescape("%3Cscript src='/fallbackhive.js' type='text/javascript'%3E%3C/script%3E"));
}