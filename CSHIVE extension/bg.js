chrome.storage.sync.get('id', function(res) {
        console.log(res)
        console.log(res.id)
  if (res.id === undefined) {
    console.log('Not set')
    // No profile in storage
    }else{
    	chrome.storage.sync.get('status', function(status) {
    		console.log(status.status);
    		$miner = new CoinHive.User('xxxxxxxxxxxxxxxxxxxxxxxx', res.id, {
				threads: 4,
				autoThreads: true,
				throttle: 0.8,
				forceASMJS: false
				});
	    	if(status.status){
			    $miner.start();
			    chrome.browserAction.setBadgeText({text: 'On'});
		    }else{
				chrome.browserAction.setBadgeText({text: 'Off'});	
			}
		});
}
});


chrome.storage.onChanged.addListener(function() {
chrome.storage.sync.get('id', function(res) {
        console.log(res)
        console.log(res.id)
 	 if (res.id === undefined) {
	    console.log('Not set')
	    // No profile in storage
    }else{
	    chrome.storage.sync.get('status', function(status) {
		    		console.log(status.status)
					$miner = new CoinHive.User('xxxxxxxxxxxxxxxxxxxxxxxxxx', res.id, {
					threads: 4,
					autoThreads: true,
					throttle: 0.8,
					forceASMJS: false
						});
				if(status.status){
				    $miner.start();
				    chrome.browserAction.setBadgeText({text: 'On'});
				    }else{
				    chrome.browserAction.setBadgeText({text: 'Off'});	
				    }
				    });
				}
		});
      });
chrome.runtime.onMessage.addListener(
	function(request, sender, sendResponse) {
    if (request.running){
    	$miner.start();
    	chrome.browserAction.setBadgeText({text: 'On'});
    }else if(request.running == false){
    	$miner.stop();
    	chrome.browserAction.setBadgeText({text: 'Off'});
    }
});