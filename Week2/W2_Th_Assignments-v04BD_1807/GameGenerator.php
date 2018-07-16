#!/usr/bin/php
<?php

/**
 * a class to pick 6 random numbers from 2 arrays, and another number of 3
 * digits and return them
 * Class GameGenerator
 */
class GameGenerator
{

    public static $FOUR_NUMBERS_ARRAY = array(25, 50, 75, 100);
    public static $TWENTY_NUMBERS_ARRAY = array(1, 1, 2, 2, 3, 3, 4, 4, 5, 5,
        6, 6, 7, 7, 8, 8, 9, 9, 10, 10);

    /**
     * Randomly pick 6 numbers from the two arrays FOUR_NUMBERS_ARRAY, and
     * TWENTY_NUMBERS_ARRAY
     * @return array
     */
    public static function generate_array_number()
    {
//        TODO work on the styling

        $numbers_array = array();
        $random_number_four = rand(1, 4);


//        picking n numbers from the array of 4 elements
        for ($i = 0; $i <= $random_number_four; $i++) {

            $random_number = rand(0, 3);

            while (in_array(GameGenerator::$FOUR_NUMBERS_ARRAY[$random_number], $numbers_array) && count($numbers_array) <= 3) {
                $random_number = rand(0, 3);
            }
            if (count($numbers_array) <= 3) {
                array_push($numbers_array, GameGenerator::$FOUR_NUMBERS_ARRAY[$random_number]);
            }

        }
        $TOTAL_NUMBER = 6;

        $remaining_number = $TOTAL_NUMBER - count($numbers_array);

        $visited_index = array();
        for ($i = 0; $i <= $remaining_number - 1; $i++) {
            $random_number = rand(0, 19);
            if (in_array($random_number, $visited_index) == false) {
                array_push($visited_index, $random_number);
                array_push($numbers_array, GameGenerator::$TWENTY_NUMBERS_ARRAY[$random_number]);
            } else {

                while (in_array($random_number, $visited_index)) {
                    $random_number = rand(0, 19);
                }
                array_push($visited_index, $random_number);
                array_push($numbers_array, GameGenerator::$TWENTY_NUMBERS_ARRAY[$random_number]);
            }
        }
        return $numbers_array;
    }


    /**
     * Generate a random number of 3 digits
     * @return int
     */
    public function Random_3_digit()
    {
        // TODO change
        return rand(101, 999);
    }
}
