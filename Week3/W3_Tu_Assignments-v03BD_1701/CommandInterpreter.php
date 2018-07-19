<?php
require_once "Database.php";

/**
 * Class CommandInterpreter
 */
class CommandInterpreter
{

    private $user_input = "";

    /**
     * @return string
     */
    private function getUserInput()
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
        $validity = $this->checkValidity($user_input_in_array);
        if ($validity) {
            $this->sendToDatabase($user_input_in_array);
        }
    }

    /**
     * @param $user_input_array
     * @return bool
     */
    private function checkValidity($user_input_array)
    {
        $valid = false;
        switch ($user_input_array) {

            case (strtoupper($user_input_array[0]) == "CREATE"):
                $valid = $this->checkCREATEValidity($user_input_array);
                break;

            case (strtoupper($user_input_array[0]) == "GET"):
                $valid = $this->checkSELECTValidity($user_input_array);
                break;

            case (strtoupper($user_input_array[0]) == "UPDATE"):
                $valid = $this->checkUPDATEValidity($user_input_array);
                break;

            case(strtoupper($user_input_array[0]) == "DELETE"):
                $valid = $this->checkDELETEValidity($user_input_array);
                break;
            case(strtoupper($user_input_array[0]) == "INSERT"):
                $valid = $this->checkINSERTValidity($user_input_array);
                break;

            default:
                print("The command you entered is not valid") . PHP_EOL;
        }
        return $valid;
    }

    /**
     * checks if the create command is of correct format
     * @param $user_input_command_array
     * @return bool
     */
    private function checkCREATEValidity($user_input_command_array)
    {
        $valid = false;
        if (sizeof($user_input_command_array) == 3) {
            if (strtoupper($user_input_command_array[1]) == "TABLE" ||
                (strtoupper($user_input_command_array[1]) == "DATABASE")) {
                $valid = true;
            } else {
                $valid = false;
            }
        }
        if (!$valid) {
            print("not valid CREATE statement") . PHP_EOL;
        }
        return $valid;
    }

    /**
     * checks if the select command is of correct format
     * @param $user_input_command_array
     * @return bool
     */
    private function checkSELECTValidity($user_input_command_array)
    {
        $valid = false;
        if (sizeof($user_input_command_array) == 2) {
            $valid = true;
//            print("Valid SELECT statement") . PHP_EOL;
        } else {
            print("not valid SELECT statement") . PHP_EOL;
        }
        return $valid;
    }

    /**
     * checks if the update command is of correct format
     * @param $user_input_command_array
     * @return bool
     */
    private function checkUPDATEValidity($user_input_command_array)
    {
        $valid = false;
        if (sizeof($user_input_command_array) == 3) {
            if ($this->isJson($user_input_command_array[2])) {
                $valid = true;
//                print("Valid UPDATE statement") . PHP_EOL;
            } else {
                $valid = false;
            }
        }
        if (!$valid) {
            print("not valid UPDATE statement") . PHP_EOL;
        }
        return $valid;
    }

    /**
     * checks if a string of json format
     * @param $string
     * @return bool
     */
    private function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     * checks if the delete command is of correct format
     * @param $user_input_command_array
     * @return bool
     */
    private function checkDELETEValidity($user_input_command_array)
    {
        $valid = false;
        if (sizeof($user_input_command_array) == 3) {
            if (strtoupper($user_input_command_array[1]) == "TABLE" ||
                (strtoupper($user_input_command_array[1]) == "DATABASE")) {
                $valid = true;
//                print("Valid DELETE statement") . PHP_EOL;
            } else {
                $valid = false;
            }
        }
        if (!$valid) {
            print("not valid DELETE statement") . PHP_EOL;
        }
        return $valid;
    }

    /**
     * checks if the insert command is of correct format
     * @param $user_input_command_array
     * @return bool
     */
    private function checkINSERTValidity($user_input_command_array)
    {
        $valid = false;
        if (sizeof($user_input_command_array) == 2) {
            if ($this->isJson($user_input_command_array[1])) {
                $valid = true;
//                print("Valid INSERT statement") . PHP_EOL;
            } else {
                $valid = false;
            }
        }
        if (!$valid) {
            print("not valid INSERT statement") . PHP_EOL;
        }
        return $valid;
    }

    /**
     * checks the command and sends the command to the right database method
     * @param $user_input_array
     */
    private function sendToDatabase($user_input_array)
    {
        $database_instance = new Database();

        switch ($user_input_array) {
            case (strtoupper($user_input_array[0]) == "CREATE"):
                if (strtoupper($user_input_array[1]) == "DATABASE")
                    $database_instance->createDatabase($user_input_array[2]);
                else $database_instance->createTable($user_input_array[2]);
                break;

            case (strtoupper($user_input_array[0]) == "GET"):
                print($database_instance->GET($user_input_array[1]));
                break;

            case (strtoupper($user_input_array[0]) == "UPDATE"):
                $database_instance->updateFieldInTable($user_input_array[1],
                    $user_input_array[2]);
                break;

            case (strtoupper($user_input_array[0]) == "DELETE"):
                if (strtoupper($user_input_array[1]) == "DATABASE")
                    $database_instance->deleteDatabase($user_input_array[2]);
                else $database_instance->deleteTable($user_input_array[2]);
                break;

            case (strtoupper($user_input_array[0]) == "INSERT"):
                $database_instance->insertIntoTable($user_input_array[1]);
                break;


            default:
                print("Not sent to database for some reason") . PHP_EOL;
        }
    }


}