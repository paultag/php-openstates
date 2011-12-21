<?php

include( "openstates/openstates.php" );
include( "conf/openstates.php" );
$x = new openstates( $API_KEY );
$states = $x->metadata();

// print_r( $states );

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Open States</title>
		<script type = 'text/javascript' src = 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js' ></script>
		<script src  = 'client.js' type = 'text/javascript' ></script>
		<link href = 'css/default.css' type = 'text/css' rel = 'stylesheet' ></link>
	</head>
	<body>
		<div class = 'container' >
			<div class = 'content' >
				<center>
					<h1>Explore some OpenStates Data</h1>
					<br /><br />
					I'm looking for a
					<select id = 'type' name = 'state' class = 'ui-input' >
						<option class = 'ui-input' value = 'bill' >bill</option>
						<option class = 'ui-input' value = 'legi' >legislator</option>
						<option class = 'ui-input' value = 'ctty' >committee</option>
					</select>
					in the state of
					<select id = 'state' name = 'state' class = 'ui-input' >
<?php
foreach ( $states as $state ) {
	echo "<option class = 'ui-input' value = '" . $state->abbreviation . "' >"
		. $state->name . "</option>\n";
}
?>
					</select><br />
					<input id = 'search' type = 'text' name = 'tq' size = '80' class = 'ui-input' /><br />
					<div id = 'search-res' class = 'results' ></div>
				</center>
			</div>
		</div>
	</body>
</html>


