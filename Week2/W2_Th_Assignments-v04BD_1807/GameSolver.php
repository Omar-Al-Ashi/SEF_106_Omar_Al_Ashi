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
                $this->arrayPermutation($new_items, $new_permutations, $ret);
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
        $tmp = $this->arrayCombinations($arrays, $i + 1);

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

//    public function getArrayNumbers()
//    {
//        $numbers = new GameGenerator();
//        $numbers->generating_numbers();
//        print_r($numbers);
//    }


//TODO fix the call of functions of other class (generate_array_number)
    public function joinArithmeticOperations($generated_array_number)
    {
        $permutations_array = $this->arrayPermutation($generated_array_number);
        print_r($permutations_array);

//        $this->convertArrayToString($generated_array_number);
//        for ($i = 0; $i < sizeof($permutations_array); $i++) {
//            $array_of_combinations = $this->arrayCombinations(array($permutations_array[$i], ["+", "-", "/", "*"], $permutations_array[$i]));
//            print_r($array_of_combinations);
//        }
//        for ($i = 0; $i < sizeof($array_of_combinations); $i++) {
//            for ($j = 0; $j < 3; $j++) {
//                print_r($array_of_combinations);
//            }
//            print("\n");
//        }
    }

    public function convertArrayToString($numbers_array){
            $string_value = $numbers_array[0]. $numbers_array[1]. $numbers_array[2]. $numbers_array[3]. $numbers_array[4]. $numbers_array[5];
            print($string_value);
    }
}

$game_generator = new GameGenerator();
print("The generated Array number is ");
print_r($generated_array = ($game_generator->generate_array_number()));
print("The Expected number is ".$game_generator->Random_3_digit()).PHP_EOL;


$game_solver = new GameSolver();
$game_solver->joinArithmeticOperations($generated_array);



