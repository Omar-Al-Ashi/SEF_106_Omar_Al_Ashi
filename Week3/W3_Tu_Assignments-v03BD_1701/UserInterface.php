<?php

require_once "CommandInterpreter.php";
class UserInterface
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

    /**
     * function to get the input command from the user
     */
    public function userInputPrompt()
    {
        $this->setUserInput(readline("Command: "));
    }


    /**
     *  function to get the user input and send it to CommandInterpreter to be interpreted and
     *  sent to database
     */
    public function redirectInput(){
        $command_interpreter_instance = new CommandInterpreter();
        $command_interpreter_instance->setUserInput($this->getUserInput());
    }

    /**
     * function that calls userInputPrompt to get the command to execute
     * and then redirects the input to CommandInterpreter class
     */
    public function mainBrain(){
        $this->userInputPrompt();
        $this->redirectInput();
    }
}

$user_interface_instance = new UserInterface();
$user_interface_instance->mainBrain();