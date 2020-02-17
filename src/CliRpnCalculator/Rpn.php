<?php

namespace CliRpnCalculator;

class Rpn
{

    private static $acceptable_operators =  ["+", "-", "/", "*"];

    private static $stack = [];
    private static $operator = false;


    /**
     * @param $pattern
     * @return mixed
     * @throws \Exception
     */
    public static function Calculate(string $pattern)
    {
        //check pattern
        if (empty($pattern)) {
            return end(self::$stack) ?? 0;
        }

        //explode pattern
        $pattern_array = explode( ' ', str_replace("  ", " ", trim($pattern)));

        //do calculation
        foreach ($pattern_array as $value) {
            if (is_numeric($value)) {
                array_push(self::$stack, $value);
            } elseif (in_array($value, self::$acceptable_operators)) {
                self::$operator = $value;
                self::DoCalculation();
            } else {
                throw new \Exception('Invalid character "'.$value . '". This character is not allowed.');
            }
        }

        //retut last stack element
        return end(self::$stack);
    }


    /**
     * @throws \Exception
     */
    private static function DoCalculation() {

        //check stack
        if (empty(self::$stack)) {
            throw new \Exception('Calculation stack is empty.');
        }

        //if only 1 element in stack
        if (count(self::$stack) === 1) {
            return;
        }

        //get 2 last elements
        $second_number = self::$stack[count(self::$stack) - 2];
        $first_number = self::$stack[count(self::$stack) - 1];

        //swithc operator
        switch (self::$operator) {
            case '+':
                array_push(self::$stack, $second_number + $first_number);
                break;
            case '-':
                array_push(self::$stack, $second_number - $first_number);
                break;
            case '/':
                array_push(self::$stack, $second_number / $first_number);
                break;
            case '*':
                array_push(self::$stack, $second_number * $first_number);
                break;
        }

        //prevent double operations with 1 operator
        self::$operator = false;

        return;
    }
}