<?php
require_once 'autoload.php';

use CliRpnCalculator\{Cli, Rpn};


$render = function($value) {
    $result = Rpn::Calculate($value);
    echo sprintf("= %01.2f\n", $result);
};

try {
    $cli = new Cli($render);
} catch (\Exception $exception) {
    echo sprintf("%s\n", $exception->getMessage());
}
