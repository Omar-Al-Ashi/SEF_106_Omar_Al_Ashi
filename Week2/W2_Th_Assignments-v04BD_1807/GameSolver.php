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

        // concatenate each array from tmp with each element from $arrays[$i]
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
    function alternateMerge($arr1, $arr2, $n1, $n2)
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
        while ($i < $n1){
            $arr3[$k++] = $arr1[$i++];
        }

        // Store remaining elements of second array
        while ($j < $n2) {
            $arr3[$k++] = $arr2[$j++];
        }

        echo "Array after merging" . "\n";
        for ($i = 0; $i < ($n1 + $n2); $i++) {
            print_r($arr3[$i]);
        }
    }


    public function joinArithmeticOperations($generated_array_number)
    {
        $string = "";
        $permutations_array = $this->arrayPermutation($generated_array_number);
        print_r($permutations_array);
        $arithmetic_operation_array = $this->ARITHMETIC_OPERATION;

        for ($i = 0 ; $i<6 ; $i++){
            for ($j = 0 ; $j<4 ; $j++){
                $string .= $permutations_array[0][$i] . $arithmetic_operation_array[$j];
                print $string;
            }
        }
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
