<?php
require_once 'autoload.php';

use CliRpnCalculator\{Cli, Rpn};


//render function
$render_callback = function($value) {
    $result = Rpn::Calculate($value);
    echo sprintf("= %01.2f\n", $result);
};

try {
    $cli = new Cli();
    $cli->ReadInput($render_callback);
} catch (\Exception $exception) {
    //can be moved to log or displayed as warning
    echo sprintf("%s\n", $exception->getMessage());
}
