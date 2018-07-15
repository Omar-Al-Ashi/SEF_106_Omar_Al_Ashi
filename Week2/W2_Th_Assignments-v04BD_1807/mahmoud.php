<?php

function getOperations($array = array(array("+"),array("-"),array("*"),array("/")), $length){
    $ARITHMETIC_OPERATION = ["+", "-", "*", "/"];
    // Initial case. $array should be empty when calling the function from outside
    if(sizeof($array) == 0){
        // 4 is the number of available operations
        for ($i = 0; $i < 4; $i++){
            array_push($array, array($ARITHMETIC_OPERATION[$i]));
        }
    }

    if(sizeof($array[0]) == $length){
        return $array;
    }

    $internal_array = [];

    for ($i = 0; $i < sizeof($array); $i++){
        $sub_array = $array[$i];
        // 4 is the number of available operations
        for ($j = 0; $j < 4; $j++){
            $internal_sub_array = $sub_array;
            array_push($internal_sub_array, $ARITHMETIC_OPERATION[$j]);


            array_push($internal_array, $internal_sub_array);
        }
    }

    return getOperations($internal_array, $length);
}

function joinArithmeticOperations($generated_array_number)
{
    $permutations_array = array($generated_array_number);
    //print_r($permutations_array);

    $returned_array = [];

    for ($perm = 0; $perm < sizeof($permutations_array); $perm++){
        //print_r("perm is " . $perm);
        $current_perm = $permutations_array[$perm];
        //print_r("current perm is " . sizeof($current_perm));
        $length = sizeof($current_perm) - 1;
        //print_r("length is " . $length);

        $operations_for_perm = getOperations([], $length);
        //print_r("operations_for_perm is " . sizeof($operations_for_perm));

        for($op = 0; $op < sizeof($operations_for_perm); $op++){
            //print_r("op is " . $op);
            $equation = "";
            for($i = 0; $i < $length; $i++){
                //print_r("    i is " . $i);
                $equation .= $current_perm[$i] . $operations_for_perm[$op][$i];
            }
            $equation .= $current_perm[sizeof($current_perm)-1];
            //print_r("equation is " . $equation);
            array_push($returned_array, $equation);
            print_r($equation . "\n");
        }

    }

    return $returned_array;
}

joinArithmeticOperations([1,2]);