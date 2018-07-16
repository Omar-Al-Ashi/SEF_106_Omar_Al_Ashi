#!/usr/bin/php
<?php
require_once "GameGenerator.php";

class GameSolver
{
    public $ARITHMETIC_OPERATION = ["+", "-", "*", "/"];

    public function evaluate($three_digit_number)
    {
        $game_generator = new GameGenerator();

        $generated_array = ($game_generator->generate_array_number());
        $output = $this->joinArithmeticOperations($generated_array);

        for ($i = 0; $i < sizeof($output); $i++) {
            $result = eval('return ' . $output[$i] . ';');
            if ($result == $three_digit_number) {
                print_r("Solution [Exact]: ".$output[$i]);
                print("= ".$result ). PHP_EOL;
                return;
            }
        }
    }

    public function joinArithmeticOperations($generated_array_number)
    {
        $permutations_array = $this->arrayPermutation($generated_array_number);

        $returned_array = [];

        for ($perm = 0; $perm < sizeof($permutations_array); $perm++) {
            $current_perm = $permutations_array[$perm];
            $length = sizeof($current_perm) - 1;

            $operations_for_perm = $this->getOperations([], $length);

            for ($op = 0; $op < sizeof($operations_for_perm); $op++) {
                $equation = "";
                for ($i = 0; $i < $length; $i++) {
                    $equation .= $current_perm[$i] . $operations_for_perm[$op][$i];
                }
                $equation .= $current_perm[sizeof($current_perm) - 1];
                array_push($returned_array, $equation);
            }

        }

        return $returned_array;
    }

    /**
     * Function that takes an array and outputs a new array that contains all
     * the permutations of the array
     * @param $items
     * @param array $perms
     * @param array $ret
     * @return array
     */
    public function arrayPermutation($items, $perms = [], &$ret = [])
    {
        if (empty($items)) {
            $ret[] = $perms;
        } else {
            for ($i = count($items) - 1; $i >= 0; --$i) {
                $new_items = $items;
                $new_permutations = $perms;
                list($foo) = array_splice($new_items, $i, 1);
                array_unshift($new_permutations, $foo);
                $this->arrayPermutation($new_items, $new_permutations, $ret);
            }
        }
        return $ret;
    }

    public function getOperations($array = array(array("+"), array("-"), array("*"), array("/")), $length)
    {
        // Initial case. $array should be empty when calling the function from outside
        if (sizeof($array) == 0) {
            // 4 is the number of available operations
            for ($i = 0; $i < 4; $i++) {
                // add the arithmetic operations each in a new array
                array_push($array, array($this->ARITHMETIC_OPERATION[$i]));
            }
        }

        // Exit condition. Check if the length of any of the internal arrays is as long as we need (we use index 0)
        if (sizeof($array[0]) == $length) {
            return $array;
        }

        // The array to be returned
        $internal_array = [];

        for ($i = 0; $i < sizeof($array); $i++) {
            $sub_array = $array[$i];
            // 4 is the number of available operations
            for ($j = 0; $j < 4; $j++) {
                $internal_sub_array = $sub_array;
                array_push($internal_sub_array, $this->ARITHMETIC_OPERATION[$j]);


                array_push($internal_array, $internal_sub_array);
            }
        }

        return $this->getOperations($internal_array, $length);
    }

    /**
     * Function that converts an array to a string
     * @param $numbers_array
     */
    public function convertArrayToString($numbers_array)
    {
        $string_value = $numbers_array[0] . $numbers_array[1] . $numbers_array[2] . $numbers_array[3] . $numbers_array[4] . $numbers_array[5];
        print($string_value);
    }
}