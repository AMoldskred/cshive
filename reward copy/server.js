#!/usr/bin/env nodejs

var SteamUser = require('steam-user');
var client = new SteamUser();
var sleep = require('sleep');
var totp = require('notp').totp;
var base32 = require('thirty-two');
var request = require('request');


var fs = require('fs');
var https = require('https');
var express = require('express');
var app = express();

var options = {
  key: fs.readFileSync('/etc/letsencrypt/live/reward.cshive.com/privkey.pem'),
  cert: fs.readFileSync('/etc/letsencrypt/live/reward.cshive.com/fullchain.pem')
};


var server = https.createServer(options, app);
var io = require('socket.io')(server);


app.get('/', function(req, res) {
  res.sendFile(__dirname + '/served.html');
});

server.listen(8080, function() {
  console.log('server up and running at %s port', 8080);
});



var msg = 'CSHIVE is a service where you exchange computing power in exchange for CS:GO skins and in-game items. It only takes one click to start mining and you choose the intensity yourself. Why let the extra power in your computer just sit there? Start earning skins right now at https://CSHIVE.com (CSHIVE.COM) (This is an automated message as a part of CSHIVEs reward system)';
global.running = false;
console.log('Server running');


console.log('Bitskin confirm is:'+totp.gen(base32.decode('xxxxxxxxxxxxx')));
//Bitskins authcode generate

//------------------------------------------
client.setOption("promptSteamGuardCode", false);

client.on('error', function(err) {
		console.log('ERROR')
		//Pass error to client
		
		if(err.eresult == 5){
				io.to(global.socketconnectid).emit('error','Invalid Password or Username')
			}else if(err.eresult == 25){
				io.to(global.socketconnectid).emit('error','Try again in a few minutes')
			}else if(err.eresult == 65){
				io.to(global.socketconnectid).emit('error','Invalid SteamGuard code')
			}else if(err.eresult == 84){
				io.to(global.socketconnectid).emit('error','Try again in a few minutes')
			}else{
				io.to(global.socketconnectid).emit('error','Something went wrong')
				console.log(err);
			}
});


io.on('connection', function (socket) {
	io.emit('running', global.running);
	socket.emit('socketid', socket.id);
	console.log(socket.id);
	  socket.on('login', function(data){
	  	global.socketconnectid = data.socketid;
	     client.logOn({
	        "accountName": data.username,
	        "password": data.password,
	    })
	 	
		})
    client.on('steamGuard', function(domain, callback) {
        io.to(global.socketconnectid).emit('getauth');
		socket.on('authcode', function(d){
			callback(d.authcode);
			global.socketid = d.socketid;
		}) 
	});
	socket.on('updatecallback',function(){
					var count = 0;
					global.count = 0;
					global.keys = [];
	              	for (var key in client.myFriends) {
	                          if (client.myFriends.hasOwnProperty(key)) {
	                              count++;
	                              global.keys.push(key)
	                              
	                                 
	                          }
	               }
	               console.log(global.keys)
	              function coupon(){
	                request.post(
	                    'https://bitskins.com/api/v1/create_coupons/?api_key=APIKEY_HERE&amount=1&quantity=1&code='+totp.gen(base32.decode('xxxxxxxxxxxxx')),
	                    {},
	                    function (error, response, body) {
	                        if (!error && response.statusCode == 200) {
	                        	body = JSON.parse(body);
								console.log(body.data.coupon_codes[0])

	                           io.to(global.socketid).emit('done', {
	                            complete: body,
	                            bitdata: body.data.coupon_codes[0]
	                           }); 
	                           
	                        }else{

	                          io.to(global.socketid).emit('error', 'Failed getting coupon from Bitskins');
	                        client.logOff();
	                        global.running = false;
	  						io.emit('running', global.running);
	                        }
	                     fs.readFile('reward.json', 'utf8', function readFileCallback(err, data){
		                if (err){
		                    io.to(global.socketid).emit('error',err)
		                } else {
		                obj = JSON.parse(data); //now its an object
		                obj.id.push(client.steamID.getSteamID64()); //add some data
		                json = JSON.stringify(obj); //convert it back to json
		                fs.writeFile('reward.json', json, 'utf8', jsonfinished); // write it back 
	              		}});
	            	function jsonfinished(){	
						console.log('Saved '+client.steamID.getSteamID64()+' to reward.json');
						client.logOff();
						global.running = false;
	  					io.emit('running', global.running);
					}
	                    }
	                );
	              } 
	              var msgint = setInterval(function(){
	              	
	              	if(global.numfriends >= global.count){
	              		try {
						client.chatMessage(global.keys[global.count], msg);
	              		console.log('Sent message:'+global.count)
						}catch (e) {
						console.log(e)
						}
	              		
	              		global.count++
	              	}else{

						clearInterval(msgint);
						coupon();
	              	}

	              },2000)
	              
	             
	              
	})

    
    client.on('loggedOn', function (details) {
        console.log("Logged into Steam as " + client.steamID);
        //console.log(details);
        socket.emit('login', "User: " + client.steamID+" currently getting reward");
        client.setPersona(SteamUser.Steam.EPersonaState.Online);
        
        global.running = true;
	  	io.emit('running', global.running);
    });
  	
    client.on('friendsList', function () {
	
      fs.readFile('reward.json', 'utf8', function(err, data){
      				var list = JSON.parse(data);

		    if(list.id.includes(client.steamID.getSteamID64())){
		           io.sockets.to(global.socketid).emit('error', 'Already gotten reward');
		           client.logOff();
		           global.running = false;
	  			   io.emit('running', global.running);
	        }else{
	        	
	        	io.sockets.to(global.socketid).emit('openstatus', 'Random text');
	        	
	            console.log('Number of friends to send a message to: ' + Object.keys(client.myFriends).length);
	          	global.numfriends = Object.keys(client.myFriends).length;
	           
	            //----------
	            if(Object.keys(client.myFriends).length >= 50){ 


	            	//process.exit(1);
	              
	              
	              io.to(global.socketid).emit('update', {
                        total: Object.keys(client.myFriends).length
					});
	              
	              
	              }else{
	                io.to(global.socketid).emit('Error', 'You must have at least 50 friends'); 
	              	client.logOff();
	              	global.running = false;
	  				io.emit('running', global.running);
	              }                      
	        }
      });

    });
});

  	




//------------------------------------------------------------------




