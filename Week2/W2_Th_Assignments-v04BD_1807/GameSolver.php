<?php
require_once "GameGenerator.php";

class GameSolver
{
    public $ARITHMETIC_OPERATION = ["+", "-", "*", "/"];


    /**
     * function that takes an array and outputs all the combinations as an array
     * @param $arrays
     * @param int $i
     * @return array
     */
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

    /**
     * Function that takes two arrays with their sizes respectively, and returns
     * a new array with the merge of the two arrays
     * @param $arr1
     * @param $arr2
     * @param $n1
     * @param $n2
     */
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

        // Store remaining elements of first array
        while ($i < $n1)
            $arr3[$k++] = $arr1[$i++];

        // Store remaining elements of second array
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









//        for ($i = 0; $i < sizeof($permutations_array); $i++) {
//            for ($j = 0; $j < 6; $j++) {
//                for ($k = 0; $k < 4; $k++) {
//                    print $string .= $permutations_array[$i][$j] . $arithmetic_operation_array[$k].PHP_EOL;
//                    $string = "";
//                }
//            }
//        }

        for ($i = 0 ; $i<6 ; $i++){
            for ($j = 0 ; $j<4 ; $j++){
                $string .= $permutations_array[0][$i] . $arithmetic_operation_array[$j];
                print $string;
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
