<?php

global $initialNumber;
$initialNumber = $argv[1];

$numberAlreadyUseds = [];

function sumNumber($number)
{
    preg_match_all("/\d/", $number, $numbers);
    return array_reduce($numbers[0], function ($previous, $current) {
        $current *= $current;
        return $current +=$previous;
    });
}

function getNumberHappy($number, $numberAlreadyUseds)
{
    global $initialNumber;
    $sumOfNumbers = sumNumber($number);
    if (in_array($sumOfNumbers, $numberAlreadyUseds)) {
        $numberAlreadyUseds[] = $sumOfNumbers;
        print_r($numberAlreadyUseds);
        die("O número $initialNumber é infeliz :(");
    }

    $numberAlreadyUseds[] = $sumOfNumbers;

    if ($sumOfNumbers == 1) {
        print_r($numberAlreadyUseds);
        die("O número $initialNumber é feliz :)");
    }


    $numberAlreadyUseds[] = $sumOfNumbers;
    getNumberHappy($sumOfNumbers, $numberAlreadyUseds);
}

getNumberHappy($initialNumber, $numberAlreadyUseds);
