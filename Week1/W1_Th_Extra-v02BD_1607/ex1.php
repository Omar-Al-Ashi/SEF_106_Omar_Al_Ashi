#!/bin/php
<?php

function random_char($n)
{
//    generate randomly "W" and "B" and fill in array
    $fill_hats = array();
    for ($i = 0; $i < $n; $i++) {
        $fill_hats[$i] = rand(0, 1) ? 'W' : 'B';
    }
    return $fill_hats;
}


function hats_solution($filled_array_with_b_w)
{
//    function that solves the "guess my hat riddle"
    $solution_array = array();

    for ($i = 0; $i < sizeof($filled_array_with_b_w); $i++) {
        // checking for the first element
        if ($i == 0) {
            if ($filled_array_with_b_w[1] == "B") {
                array_push($solution_array, "B");
            } else {
                array_push($solution_array, "W");
            }
            // checking for the last element
        } elseif ($i == sizeof($filled_array_with_b_w) - 1) {
            if ($solution_array[$i - 1] == "w" || $solution_array[$i - 1] == "B") {
                array_push($solution_array, "B");
            } elseif ($solution_array[$i - 1] == "W" || $solution_array[$i - 1] == "b") {
                array_push($solution_array, "W");
            }
            //checking for the middle elements
        } else {
            if ($solution_array[$i - 1] == "B" && $filled_array_with_b_w[$i + 1] == "B") {
                array_push($solution_array, "B");
            } elseif ($solution_array[$i - 1] == "B" && $filled_array_with_b_w[$i + 1] == "W") {
                array_push($solution_array, "b");
            } elseif ($solution_array[$i - 1] == "W" && $filled_array_with_b_w[$i + 1] == "W") {
                array_push($solution_array, "W");
            } elseif ($solution_array[$i - 1] == "W" && $filled_array_with_b_w[$i + 1] == "B") {
                array_push($solution_array, "w");
            } elseif ($solution_array[$i - 1] == "b" && $filled_array_with_b_w[$i + 1] == "B") {
                array_push($solution_array, "w");
            } elseif ($solution_array[$i - 1] == "b" && $filled_array_with_b_w[$i + 1] == "W") {
                array_push($solution_array, "W");
            } elseif ($solution_array[$i - 1] == "W" && $filled_array_with_b_w[$i + 1] == "W") {
                array_push($solution_array, "W");
            } elseif ($solution_array[$i - 1] == "w" && $filled_array_with_b_w[$i + 1] == "B") {
                array_push($solution_array, "B");
            } elseif ($solution_array[$i - 1] == "w" && $filled_array_with_b_w[$i + 1] == "W") {
                array_push($solution_array, "b");
            } elseif ($solution_array[$i - 1] == "w" || $solution_array[$i - 1] == "B") {
                array_push($solution_array, "B");
            } elseif ($solution_array[$i - 1] == "W" || $solution_array[$i - 1] == "b") {
                array_push($solution_array, "W");
            } else array_push($solution_array, "Nothing");
        }
    }
    return $solution_array;
}

function convert_to_format($array)
{
//    function that converts from an array to a list
    $correct_array_form = array();
    for ($i = 0; $i < sizeof($array); $i++) {
        if ($array[$i] == "b" || $array[$i] == "B")
            array_push($correct_array_form, "Black");
        else
            array_push($correct_array_form, "White");
        print($correct_array_form[$i]) . PHP_EOL;
    }
}

function check_if_won($generated, $guesses)
{
//    function that checks if 2 arrays are identical starting from the second index
    for ($i = 1; $i < sizeof($generated); $i++) {
        $correct = False;
        if ($generated[$i] == $guesses[$i]) {
            $correct = True;
        }
    }
    if ($correct)
        print("The guesses are correct") . PHP_EOL;
}

$filled_array = random_char(10);
print("The generated array is") . PHP_EOL;
$generated = convert_to_format($filled_array);
$solution = hats_solution($filled_array);
print("The guessed array is") . PHP_EOL;
$guesses = convert_to_format($solution);
check_if_won($filled_array, $solution);

?>