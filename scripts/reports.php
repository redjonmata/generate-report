<?php

require_once('/home/redjon/Downloads/Task/TASK/models/Customer.php');

global $argv;
$customer = new Customer;

$mask = "|%5s |%-30s | %5s |\n";
printf($mask, 'Id', 'Date','Value');

foreach ($customer->getTransactions($argv[1]) as $transactions) {
    printf($mask, $transactions['id'], $transactions['date'],$transactions['value']);
}
