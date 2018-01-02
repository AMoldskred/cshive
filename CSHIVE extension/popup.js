		chrome.storage.sync.get('id', function(res) {
	        console.log(res)
	        console.log(res.id);

		 	 if (res.id === undefined) {
				    $('#setid').show();
				    $('#miner').hide();
		    }else{
				    $('#setid').hide();
				    $('#miner').show();
				    $('.id').html(res.id);
				    $.ajax({
					url: "https://cshive.com/exbalance.php",
					type: 'POST',
					data: {
						id: res.id
					},
					 success: function(data){
					 	$( "#balance" ).html( data );
				  		console.log(data)

					}
				}); 
				}
		});
		chrome.storage.sync.get('auto', function(res) {
	        console.log(res)
	        console.log(res.auto)

		 	 if (res.auto) {
				    $('#auto').prop('checked', true);
		    }else{
				    $('#auto').prop('checked', false);
				}
		});
		$('#auto').on('change', function(){
				console.log('Auto change');
				var status = $(this).prop('checked');
				chrome.storage.sync.set({'auto': status}, function() {
        		});
		})
			$('#save').on('click', function(){
				var id = $('#id').val();
				console.log(id);
				chrome.storage.sync.set({'id': id}, function() {
					$('#setid').hide();
				 	$('#miner').show();
        		});
			})
			$('#startmining').on('click', function(){
				chrome.runtime.sendMessage({running: true}, function(e) {
				 $('#startmining').hide();
				 $('#stopmining').show();
				});	
			})
			$('#stopmining').on('click', function(){
			chrome.runtime.sendMessage({running: false}, function(e) {
			 $('#stopmining').hide();
			 $('#startmining').show();
			});	
			})
			chrome.browserAction.getBadgeText({}, function(result) {
				console.log(result)
    		if(result == 'On'){
    			$('#startmining').hide();
				$('#stopmining').show();
    		}
			}); 
 
			