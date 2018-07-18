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
    }


}