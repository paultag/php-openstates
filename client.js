$(document).ready(function() {
	var lastPressed = new Date();
	lastPressed.setDate(0);
	
	$("#search").addClass("suceess");
	// fetch();
	
	function handleLoading() {
		lastPressed = new Date();
		fetch();
	}
	function fetch() {
		var t = new Date();
		if ( lastPressed.getTime() + 800 < t.getTime() ) {
			lastPressed = new Date();
			var id    = escape($("#search").val());
			var state = escape($("#state").val());
			
			$("#search-res").load("search-backend.php?text=" + id
				+ "&state=" + state,
			function() {
				$("#status").html("Up-to-date");

				$("#search").removeClass("failure");
				$("#search").addClass("success");
				$("#state").removeClass("failure");
				$("#state").addClass("success");
									
				$("#search").removeAttr('disabled');
				$("#state").removeAttr( 'disabled');
				
			});
		} else {
			setTimeout( fetch, 10 );
		}
	}
	$("#search").change(function() {
		handleLoading();
		
		$("#search").attr('disabled', 'disabled');
		$("#state").attr('disabled',  'disabled');
		
		$("#status").html("Loading...");
		
		$("#search").removeClass("success");
		$("#search").addClass("failure");
		
		$("#state").removeClass("success");
		$("#state").addClass("failure");		
	});
});
