<?php

class CurrencyWebservice
{

    /**
     * @todo return random value here for basic currencies like GBP USD EUR (simulates real API)
     *
     */
    public static function getExchangeRate($currency)
    {
        if ($currency === 'USD') {
            $exchangeRate = 0.909206626;
        } elseif ($currency === 'GBP') {
            $exchangeRate = 1.13376248;
        } else {
            $exchangeRate = 1;
        }

        return $exchangeRate;
    }
}