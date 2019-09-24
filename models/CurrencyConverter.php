<?php

require_once('CurrencyWebservice.php');

class CurrencyConverter
{

    public static function convert($currency, $amount)
    {
       $rate = CurrencyWebservice::getExchangeRate($currency);
       $converted = $amount * $rate;

       return $converted;
    }
}