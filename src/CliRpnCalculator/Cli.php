<?php

namespace CliRpnCalculator;


class Cli
{

    private static $exit_keywords = ['q', 'quit', 'exit'];

    public function __construct() {
        //php version check
        if (!defined('PHP_MAJOR_VERSION') || PHP_MAJOR_VERSION < 7) {
            echo 'Server need PHP 7 to run!';
        }
    }

    /**
     * @param $callback
     */
    public function ReadInput($callback) {

        while($f = fgets(STDIN)){
            $input = trim($f);
            if (in_array($input , self::$exit_keywords)) {
                exit("\nBye!\n");
            }
            call_user_func($callback, $input);
        }
    }
}