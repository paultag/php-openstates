<?php

include( "openstates/openstates.php" );
include( "conf/openstates.php" );
$x = new openstates( $API_KEY );

echo "<h3>Results</h3>";

$text  = htmlentities($_GET['text']);
$state = htmlentities($_GET['state']);
$type  = htmlentities($_GET['type']);

if ( $type == "ctty" ) {
	$cttys = $x->committees("state=" . $state . "&committee=" . $text);
	foreach ( $cttys as $ctty ) {
		print $ctty->committee . " (" . $ctty->chamber . ")<br />";
	}
} else if ( $type == "legi" ) {
	$people = $x->legislators("state=" . $state . "&last_name=" . $text);
	foreach ( $people as $person ) {
		print $person->first_name . " " . $person->last_name . " (" . $person->chamber . ")<br />";
	}
} else if ( $type == "bill" ) {

}

?>
