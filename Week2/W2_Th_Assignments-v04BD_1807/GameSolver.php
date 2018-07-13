<?php
require_once "GameGenerator.php";

class GameSolver
{

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
                arrayPermutation($new_items, $new_permutations, $ret);
            }
        }
        return $ret;
    }

    public function arrayCombinations($arrays, $i = 0)
    {
        if (!isset($arrays[$i])) {
            return array();
        }
        if ($i == count($arrays) - 1) {
            return $arrays[$i];
        }

        // get combinations from subsequent arrays
        $tmp = combinations($arrays, $i + 1);

        $result = array();

        // concat each array from tmp with each element from $arrays[$i]
        foreach ($arrays[$i] as $v) {
            foreach ($tmp as $t) {
                $result[] = is_array($t) ?
                    array_merge(array($v), $t) :
                    array($v, $t);
            }
        }

        return $result;
    }
    public function getArrayNumbers(){
        $numbers = new GameGenerator();
        $numbers->generating_numbers();
        print_r($numbers);
    }
    public function joinArithmeticOperations(){
        $permutations_array = arrayPermutation(generating_numbers());
        print_r($permutations_array);
        $array_of_combinations = array();
        for ($i = 0; $i < sizeof($permutations_array); $i++) {
            $array_of_combinations = combinations(array($permutations_array[$i], ["+", "-", "/", "*"], $permutations_array[$i]));
        }
        for ($i = 0; $i< sizeof($array_of_combinations); $i++){
            for ($j = 0 ; $j< 3 ; $j++){
                print_r($array_of_combinations[$i][$j]);

            }
            print("\n");
        }
    }



}