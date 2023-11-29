<?php
class availableFlights {
    private $flightPrices = [
        'Manila to Davao' => 1899.00,
        'Davao to Cebu' => 1399.00,
        'Davao to Manila' => 1799.00,
    ];


    public function getflightPrice($flightDesti) {
        if (array_key_exists($flightDesti, $this->flightPrices)) {
            return $this->flightPrices[$flightDesti];
        } else {
            return "Unavailable Flight Destination";
        }
    }
}
    
$server = new SoapServer(null, array('uri' => "http://localhost/webService"));
$server->setClass("availableFlights");
$server->handle();
?>
