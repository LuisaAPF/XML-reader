<?php

class CurrencyRates {

  public function getCurrencyRate($currency) {
    libxml_use_internal_errors(true);
    $xml = file_get_contents("http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml");
    $xml = str_replace('xmlns=', 'ns=', $xml); //need this to avoid empty array return
    $xml = simplexml_load_string($xml) or exit('File could not be loaded');
    $xml = $xml->xpath("//Cube/Cube/Cube[@currency='$currency']") or exit('Currency not found');
    $xml = (array)$xml[0];
    return (float)$xml['@attributes']['rate'];
  }

  public function getAmountInEuro($currency, $amount) {
    $rate = $this->getCurrencyRate($currency);
    is_float($rate) or exit($rate);
    is_numeric($amount) or exit("Amount must be a number");
    return $rate * $amount;
  }

}

?>
