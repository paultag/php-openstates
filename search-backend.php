<?php

include( "openstates/openstates.php" );
include( "conf/openstates.php" );
$x = new openstates( $API_KEY );

$text  = htmlentities($_GET['text']);
$state = htmlentities($_GET['state']);

$bills = $x->bills( "subject=" . $text );

echo "<ul>";

foreach ( $bills as $bill ) {
	echo "<li>" . $bill->bill_id . ": " . $bill->title . "</li>\n";
}

echo "</ul>";

?>
