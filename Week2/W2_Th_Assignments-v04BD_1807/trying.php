<?php


/**
 * Randomly pick 6 numbers from the two arrays FOUR_NUMBERS_ARRAY, and
 * TWENTY_NUMBERS_ARRAY
 * @return array
 */
function generating_numbers()
{

    $FOUR_NUMBERS_ARRAY = array(25, 50, 75, 100);
    $TWENTY_NUMBERS_ARRAY = array(1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10);
    $numbers_array = array();

    $random_number_four = rand(1, 4);
    $numbers_array = array();


//        picking n numbers from the array of 4 elements
    for ($i = 0; $i <= $random_number_four; $i++) {

        $random_number = rand(0, 3);

        while (in_array($FOUR_NUMBERS_ARRAY[$random_number], $numbers_array) && count($numbers_array) <= 3) {
            $random_number = rand(0, 3);
        }
        if (count($numbers_array) <= 3) {
            array_push($numbers_array, $FOUR_NUMBERS_ARRAY[$random_number]);
        }

    }
    $TOTAL_NUMBER = 6;

    $remaining_number = $TOTAL_NUMBER - count($numbers_array);

    $visited_index = array();
    for ($i = 0; $i <= $remaining_number - 1; $i++) {

        $random_number = rand(0, 19);
        if (in_array($random_number, $visited_index) == false) {
            array_push($visited_index, $random_number);
            array_push($numbers_array, $TWENTY_NUMBERS_ARRAY[$random_number]);
        } else {

            while (in_array($random_number, $visited_index)) {
                $random_number = rand(0, 19);
            }
            array_push($visited_index, $random_number);
            array_push($numbers_array, $TWENTY_NUMBERS_ARRAY[$random_number]);
        }


    }
    return $numbers_array;
}

function Random_3_digit()
{
    return rand(101, 999);
}

function arrayPermutation($items, $perms = [], &$ret = [])
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

//function operationsPermutation($ret){
//    $operations = ["+", "-", "*", "/"];
//
//}
function combinations($arrays, $i = 0)
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


//print("Random Number").PHP_EOL;
//print(Random_3_digit());
//print("array").PHP_EOL;
//print_r(generating_numbers());
//$permutations_array = arrayPermutation(generating_numbers());
//print_r($permutations_array);
////print_r($permutations_array[0]);
//for ($i = 0; $i < sizeof($permutations_array); $i++) {
////    print_r(combinations(array($permutations_array[$i], ["+", "-", "/", "*"], $permutations_array[$i])));
//    $array_of_combinations = combinations(array($permutations_array[$i], ["+", "-", "/", "*"], $permutations_array[$i]));
//}
//for ($i = 0; $i< sizeof($array_of_combinations); $i++){
//    for ($j = 0 ; $j< 3 ; $j++){
////        print_r($array_of_combinations[$i][$j])." ".PHP_EOL;
//        print_r($array_of_combinations[$i][$j]);
//
//    }
//    print("\n");
//}

function joinArithmeticOperations(){
    $permutations_array = arrayPermutation(generating_numbers());
    print_r($permutations_array);
    $array_of_combinations = array();
    for ($i = 0; $i < sizeof($permutations_array); $i++) {
        $array_of_combinations = combinations(array($permutations_array[$i], ["+", "-", "/", "*"], $permutations_array[$i]));
    }
    for ($i = 0; $i< sizeof($array_of_combinations); $i++){
        for ($j = 0 ; $j< 3 ; $j++){
            print_r($array_of_combinations[$i][$j]);
//            print_r($array_of_combinations[$i]);
//            print_r($array_of_combinations[$j]);
//            $variable = $array_of_combinations[$i][$j];
        }
        print("\n");
    }
}

joinArithmeticOperations();