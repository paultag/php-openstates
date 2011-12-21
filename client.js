$(document).ready(function() {
	var lastPressed = new Date();
	lastPressed.setDate(0);
	
	$("#search").addClass("suceess");
	fetch();
	
	function handleLoading() {
		lastPressed = new Date();
		fetch();
	}
	function fetch() {
		var t = new Date();
		if ( lastPressed.getTime() + 800 < t.getTime() ) {
			lastPressed = new Date();
			var id    = escape($("#search").val());
			var typ   = escape($("#type").val());
			var state = escape($("#state").val());
			
			$("#search-res").load("search-backend.php?text=" + id + "&type=" + typ + "&state=" + state);
			$("#search").removeClass("failure");
			$("#search").addClass("success");
		} else {
			setTimeout( fetch, 10 );
		}
	}
	$("#search").keyup(function() {
		handleLoading();
		$("#search").removeClass("success");
		$("#search").addClass("failure");
	});
});
