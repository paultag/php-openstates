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

?>
