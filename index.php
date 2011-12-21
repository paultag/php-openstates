<?php

include( "openstates/openstates.php" );
include( "conf/openstates.php" );

$x = new openstates( $API_KEY );

print_r($x->legislators("state=ma"));

?>
