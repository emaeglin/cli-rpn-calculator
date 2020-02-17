<?php

namespace CliRpnCalculator;


class Cli
{

    /**
     * Cli constructor.
     * @param $callback
     */
    public function __construct($callback) {
        while($f = fgets(STDIN)){
            $input = trim($f);
            if (in_array($input , ['q', 'quit', 'exit'])) {
                exit("\nBye!\n");
            }
            call_user_func($callback, $input);
        }
    }
}