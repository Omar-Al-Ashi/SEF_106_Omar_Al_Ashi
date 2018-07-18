<?php
require_once "Database.php";

class CommandInterpreter
{

    public $user_input = "";

    /**
     * @return string
     */
    public function getUserInput()
    {
        return $this->user_input;
    }

    /**
     * @param string $user_input
     */
    public function setUserInput($user_input)
    {
        $this->user_input = $user_input;
        $user_input_in_array = explode('#', $user_input);
        $this->checkValidity($user_input_in_array);
    }

//  If it doesn't have CREATE, SELECT, UPDATE, DELETE, INSERT as first word,
////  output(NOT accepted command)
//  if CREATE doesn't include 2 following fields (DATABASE or TABLE, and then
////  the table or database name), reject it
/// ____________________________________________________________________________
///
//  if SELECT doesn't have exactly one following word (item to search for), reject
//  ____________________________________________________________________________


//  if UPDATE doesn't include exactly 2 following fields (keyword to search for
////  and the new json representation) reject it
/// ____________________________________________________________________________
///
///
//  if DELETE doesn't include 2 following fields (Table or database and then table name or database name) reject it
/// ____________________________________________________________________________
///
//  if INSERT doesn't include following fields (json representation) reject it

// TODO check for if statements
    public function checkValidity($user_input_array)
    {
        $valid = false;
        switch ($user_input_array) {
//            check if the first word is CREATE, and following is "TABLE" or "DATABASE"
            case (strtoupper($user_input_array[0]) == "CREATE"):
                if (sizeof($user_input_array) == 3) {
                    if (strtoupper($user_input_array[1]) == "TABLE" || (strtoupper($user_input_array[1]) == "DATABASE")) {
                        $valid = true;
                        print("Valid CREATE statement") . PHP_EOL;
                    } else {
                        $valid = false;
                    }
                }
                if (!$valid){
                    print("not valid CREATE statement").PHP_EOL;
                }
                break;

            case (strtoupper($user_input_array[0]) == "SELECT"):
                if (sizeof($user_input_array) == 2) {
                    $valid = true;
                    print("Valid SELECT statement") . PHP_EOL;
                } else {
                    print("not valid SELECT statement") . PHP_EOL;
                }
                break;

            case (strtoupper($user_input_array[0]) == "UPDATE"):
                if (sizeof($user_input_array) == 3) {
                    if ($this->isJson($user_input_array[2])) {
                        $valid = true;
                        print("Valid UPDATE statement").PHP_EOL;
                    }else {
                        $valid = false;
                    }
                }
                if (!$valid){
                    print("not valid UPDATE statement").PHP_EOL;
                }
                break;

            case(strtoupper($user_input_array[0]) == "DELETE"):
                if (sizeof($user_input_array) == 3) {
                    if (strtoupper($user_input_array[1]) == "TABLE" || (strtoupper($user_input_array[1]) == "DATABASE")) {
                        $valid = true;
                        print("Valid DELETE statement") . PHP_EOL;
                    } else {
                        $valid = false;
                    }
                }
                if (!$valid){
                    print("not valid DELETE statement").PHP_EOL;
                }
                break;
            case(strtoupper($user_input_array[0]) == "INSERT"):
                if (sizeof($user_input_array == 2)){
                    if ($this->isJson($user_input_array[1])){
                        $valid = true;
                        print("Valid INSERT statement") . PHP_EOL;
                    }
                    else{
                        $valid = false;
                    }
                }
                if (!$valid){
                    print("not valid INSERT statement").PHP_EOL;
                }
                break;

            default:
                print("The command you entered is not valid") . PHP_EOL;
        }
        return $valid;
    }


    public function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }


}