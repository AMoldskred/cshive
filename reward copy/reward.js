//Clientside
var socket = io.connect();
console.log('Waiting for connection:');
socket.on('connect', function(sockets){
    $loggedin = true;
    console.log('Connected!');
    socket.on('socketid', function(data){
      $socketid = data;
    })
    socket.on('running', function(status){
      if(status){
        //Handle in use
        document.getElementById('login').disabled = true;
        $running = true;
        $loggedin = false;
        $('#loginframe').animate({
               left: '100%'
        }, 500);
        $('#info').animate({
               left: '0%'
        }, 500);
        $('#gotologin').addClass('disabled')
      }else{
        //Handle not in use
        document.getElementById('login').disabled = false;
        $running = false;
        $loggedin = true;
         $('#gotologin').removeClass('disabled')
      }
    })
}); 
socket.on('disconnect', function(sockets){
 //Handle in use
        document.getElementById('login').disabled = true;
        $running = true;
        $loggedin = false;
        $('#loginframe').animate({
               left: '100%'
        }, 500);
        $('#info').animate({
               left: '0%'
        }, 500);
        $('#gotologin').addClass('disabled')
})
	
  socket.on('error', function(err){
    Materialize.toast('ERROR: '+err, 3000);
  })
  socket.on('login', function(login){
    Materialize.toast(login, 3000);
  })
  socket.on('getauth', function(){
    $loggedin = false;
    //Prompt for Authcode
      $('#authmodal').modal('open');
      document.getElementById("authcode").focus();
      //Then send it
      $('#submitauth').on('click', function(){
        $authented = false;
        $authcode = $('#authcode').val();
        socket.emit('authcode', {
          authcode: $authcode,
          socketid: $socketid 
        });  
      })
      
    })

socket.on('update', function(upd){
      var count = 0;
      socket.emit('updatecallback');
      var updinterval = setInterval(function(){
        count++
        var percent = (count/upd.total)*100;
        $('.determinate').css({
        width: percent+'%' 
        })
        if(count <= upd.total){
         $('#statuslabel').html(count+'/'+upd.total) 
        }else{
          clearInterval(updinterval);
        }
        
      },2000)
     
      console.log("Update interval running");
    })  
 socket.on('openstatus',function(){
      $('#progressmodal').modal('open');
      console.log('Show progress')
    })
    socket.on('done', function(data){
      //Send data.friends and data.bitdata
      var coupon = data.bitdata;
      console.log(data.complete);
      //Localstore coupon
      localStorage.setItem('coupon', data.bitdata);
      $('#progressmodal').modal('close');

      $('#coupon').attr("data-clipboard-text", data.bitdata);
      $('#coupon').html(data.bitdata);
      $('#couponmodal').modal('open');
       var clipboard = new Clipboard('.clip');
      clipboard.on('success', function(e) {
            console.log(e);
        });
    })
$('.modal').modal({
  dismissible: false
});
$(document).keypress(function(e) {
    if(e.which == 13 && $loggedin) {
      $authented = true;
      var user = $('#username').val();
      var pswd = $('#password').val();
      socket.emit('login', {
        username: user,
        password: pswd
      }) 
    }else if(e.which == 13 && $authented){
      $('#submitauth').click();
      $('#authmodal').modal('close');
    }
});
$('#login').on('click', function(){
var user = $('#username').val();
var pswd = $('#password').val();
socket.emit('login', {
  username: user,
  password: pswd,
  socketid: $socketid
})
});

$('#gotologin').on('click', function(){
  if($running){
   Materialize.toast('Someone else is getting their reward right now',3000)
   setTimeout(function(){
    Materialize.toast('Please come back later',3000)
   },2000)
  }else{
    $('#loginframe').animate({
               left: '100%'
        }, 500);
    $('#info').animate({
           left: '-100%'
    }, 500);
  }
 

})
