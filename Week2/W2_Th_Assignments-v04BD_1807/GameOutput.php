<?php
require_once "GameSolver.php";
require_once "GameGenerator.php";

class GameOutput
{
    /**
     *Calls the functions of the class GameSolver and prints the requires format
     */
    public static function outputPreSolver()
    {
        $game_generator = new GameGenerator();
        $number_of_games = readline("How	 many games would you like me to play today?");

        for ($i = 0; $i < $number_of_games; $i++) {
            $generated_array = ($game_generator->generate_array_number());
            self::arrayFormatter($generated_array);
            $random_number = $game_generator->Random_3_digit();

            print("Target: $random_number") . PHP_EOL;
        }

    }

    /**
     * Takes an array and formats it to the specified format
     * @param $generated_array
     */
    public static function arrayFormatter($generated_array)
    {
        print("{ ");
        for ($i = 0; $i < sizeof($generated_array); $i++) {
            if ($i == 5) {
                print($generated_array[$i]);
            } else
                print($generated_array[$i] . ", ");
        }
        print(" }") . PHP_EOL;
    }
}

GameOutput::outputPreSolver();
