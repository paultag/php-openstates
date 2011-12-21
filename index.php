<?php

include( "openstates/openstates.php" );
include( "conf/openstates.php" );
$x = new openstates( $API_KEY );
$states = $x->metadata();

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
					<h1>Explore some OpenStates Data</h1>
					<div id = 'status' >Enter a query</div>
					<br />
					I'm looking for a bill in the state of
					<select id = 'state' name = 'state' class = 'ui-input' >
<?php
foreach ( $states as $state ) {
	echo "<option class = 'ui-input' value = '" . $state->abbreviation . "' >"
		. $state->name . "</option>\n";
}
?>
					</select>
					about
					<select id = 'search' name = 'search' class = 'ui-input' >
<?php
foreach ( $openstates_subjects as $subject ) {
	echo "<option class = 'ui-input' value = '" . $subject . "' >"
		. $subject . "</option>\n";
}
?>
					</select><br />
					<div id = 'search-res' class = 'results' ></div>
			</div>
		</div>
	</body>
</html>


