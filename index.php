<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once("./currencyRatesClass.php");

$currency = new CurrencyRates();
$myCurrency = 'BRL';
$myAmount = 25;

$rate = $currency->getCurrencyRate($myCurrency);
$amount = $currency->getAmountInEuro($myCurrency, $myAmount);

if (is_float($rate)) {
  $rate = number_format($rate, 2, ",", "");
  echo "1 $myCurrency is equal to $rate EUR <br>";
}
else echo $rate;

if (is_float($amount)) {
  $amount = number_format($amount, 2, ",", "");
  echo "$myAmount $myCurrency is equal to $amount EUR";
}
else echo $amount;
?>
