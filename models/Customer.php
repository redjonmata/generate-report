<?php

require_once('CurrencyConverter.php');

class Customer
{
    public $customer = [];

    public function getTransactions($arg)
    {
        $csv = array_map('str_getcsv', file('../data.csv'));

        foreach ($csv as $key => $c) {

            if ($key != 0) {
                $transaction = explode(';', $c[0]);
                preg_match_all('!\d+!', $transaction[2], $matches);
                $amount = $matches[0][0] . '.' . $matches[0][1];

                if (strpos($transaction[2],'$') !== false) {
                    $currency = 'USD';
                } elseif (strpos($transaction[2],'£') !== false) {
                    $currency = 'GBP';
                } else {
                    $currency = 'EUR';
                }

                if ($arg === $transaction[0]) {
                    $this->customer[] = [
                        'id' => $transaction[0],
                        'date' => $transaction[1],
                        'value' => '€'. number_format(CurrencyConverter::convert($currency, $amount),2)
                    ];
                }
            }
        }

        return $this->customer;
    }
}