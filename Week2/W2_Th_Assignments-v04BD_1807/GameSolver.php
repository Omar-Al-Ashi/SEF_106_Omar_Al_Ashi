<?php
require_once "GameGenerator.php";

class GameSolver
{
    public $ARITHMETIC_OPERATION = ["+", "-", "*", "/"];

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

    function alternateMerge($arr1, $arr2,
                            $n1, $n2)
    {
        $i = 0;
        $j = 0;
        $k = 0;
        $arr3 = array();

        // Traverse both array
        while ($i < $n1 && $j < $n2) {
            $arr3[$k++] = $arr1[$i++];
            $arr3[$k++] = $arr2[$j++];
        }

        // Store remaining elements
        // of first array
        while ($i < $n1)
            $arr3[$k++] = $arr1[$i++];

        // Store remaining elements
        // of second array
        while ($j < $n2)
            $arr3[$k++] = $arr2[$j++];

        echo "Array after merging" . "\n";
        for ($i = 0; $i < ($n1 + $n2); $i++) {
            print_r($arr3[$i]);
        }


    }

    public function joinArithmeticOperations($generated_array_number)
    {
        $string = "";
        $permutations_array = $this->arrayPermutation($generated_array_number);
//        print_r($permutations_array);
        $arithmetic_operation_array = $this->ARITHMETIC_OPERATION;

        for ($i = 0; $i < sizeof($permutations_array[0]); $i++) {
            for ($j = 0; $j < 6; $j++) {
                for ($k = 0; $k < 4; $k++) {
                    print $string .= $permutations_array[$i][$j] . $arithmetic_operation_array[$k].PHP_EOL;
                    $string = "";
//            print_r($string);
//            print_r($permutations_array[0][$i]);
//            print $string = $string . $generated_array_number[$i].PHP_EOL;
                }
            }
        }
//        print_r( $permutations_array[0]);
//        print_r( array_merge($permutations_array, $arithmetic_operation_array));

//        for ($i=0 ; $i<count($permutations_array); $i++)
//            $this->alternateMerge($permutations_array[$i], $arithmetic_operation_array, count($permutations_array[$i]), count($arithmetic_operation_array));
//        print_r($this->arrayCombinations(array($permutations_array[0],
//            $arithmetic_operation_array, $permutations_array[1],
//            $arithmetic_operation_array, $permutations_array[2],
//            $arithmetic_operation_array, $permutations_array[3])));


//        print_r($permutations_array[0]);
//        for ($i = 0; $i < sizeof($arithmetic_operation_array); $i++) {
//            for ($j = 0; $j < sizeof($permutations_array - 1); $j++) {
//                print($permutations_array[$j] . $arithmetic_operation_array[$i] . $permutations_array[$i + 1]);
//                $string = $permutations_array[$j] . $arithmetic_operation_array[$i];
//                print($string);
//            }
//        }
//        print_r($string = $permutations_array[0][0] . $arithmetic_operation_array[0] . $permutations_array[0][1] . $arithmetic_operation_array[1] . $permutations_array[0][2]);


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

//    public function getArrayNumbers()
//    {
//        $numbers = new GameGenerator();
//        $numbers->generating_numbers();
//        print_r($numbers);
//    }


//TODO fix the call of functions of other class (generate_array_number)

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

    public function convertArrayToString($numbers_array)
    {
        $string_value = $numbers_array[0] . $numbers_array[1] . $numbers_array[2] . $numbers_array[3] . $numbers_array[4] . $numbers_array[5];
        print($string_value);
    }
}

$game_generator = new GameGenerator();
print("The generated Array number is ");
print_r($generated_array = ($game_generator->generate_array_number()));
print("The Expected number is " . $game_generator->Random_3_digit()) . PHP_EOL;


$game_solver = new GameSolver();
$game_solver->joinArithmeticOperations($generated_array);



