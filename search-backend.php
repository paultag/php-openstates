<?php

include( "openstates/openstates.php" );
include( "conf/openstates.php" );
$x = new openstates( $API_KEY );

$text  = htmlentities($_GET['text']);
$state = htmlentities($_GET['state']);

$bills = $x->bills(
	"subject=" . $text,
	"state="   . $state,
	"fields=bill_id,title,sources"
);

echo "<ul>";

foreach ( $bills as $bill ) {
	echo "<li>" . $bill->bill_id . ": " . $bill->title;
	
	$id = 1;
	
	foreach ( $bill->sources as $source ) {
		echo "[<a href = '" . $source->url . "' >$id</a>]";
		$id = $id + 1;
	}
	
	echo "</li>\n";
}

echo "</ul>";

?>
