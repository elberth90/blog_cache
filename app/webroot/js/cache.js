window.onload = function() {
	if (navigator.onLine) {
    	console.log("online");
    	var appCache = window.applicationCache;
		appCache.update();
		if (appCache.status == window.applicationCache.UPDATEREADY) {
		  appCache.swapCache();
		}
	} else {
		console.log("offline");
	}
}