<?php

class openstates {

    private $api_key;
    private $urlbase;

    private function queryService( $fn, $args ) {
        $query_url = $this->urlbase . "$fn/?apikey=" . $this->api_key;
        foreach ( $args as $key ) {
            $query_url .= "&" . $key;
        }
        return $this->getJSON( $query_url );
    }

    private function getJSON( $URL ) {
        $contents = file_get_contents($URL);
        $contents = json_decode($contents);
        return $contents;
    }

    public function __construct($api_key,
        $urlbase = "http://openstates.org/api/v1/"
    ) {
        $this->api_key = $api_key;
        $this->urlbase = $urlbase;
    }

    public function __call($method, $args) {
        if (isset($this->$method) === true) {
            $func = $this->$method;
            return $func();
        } else {
            return $this->queryService($method, $args);
        }
    }
}

$openstates_subjects = array(
	"Agriculture and Food",
	"Animal Rights and Wildlife Issues",
	"Arts and Humanities",
	"Budget, Spending, and Taxes",
	"Business and Consumers",
	"Campaign Finance and Election Issues",
	"Civil Liberties and Civil Rights",
	"Commerce",
	"Crime",
	"Drugs",
	"Education",
	"Energy",
	"Environmental",
	"Executive Branch",
	"Family and Children Issues",
	"Federal, State, and Local Relations",
	"Gambling and Gaming",
	"Government Reform",
	"Guns",
	"Health",
	"Housing and Property",
	"Immigration",
	"Indigenous Peoples",
	"Insurance",
	"Judiciary",
	"Labor and Employment",
	"Legal Issues",
	"Legislative Affairs",
	"Military",
	"Municipal and County Issues",
	"Nominations",
	"Other",
	"Public Services",
	"Recreation",
	"Reproductive Issues",
	"Resolutions",
	"Science and Medical Research",
	"Senior Issues",
	"Sexual Orientation and Gender Issues",
	"Social Issues",
	"State Agencies",
	"Technology and Communication",
	"Trade",
	"Transportation",
	"Welfare and Poverty"
);

?>
