<?php

require_once "CommandInterpreter.php";

class UserInterface
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
    private function setUserInput($user_input)
    {
        $this->user_input = $user_input;
    }

    /**
     * function to get the input command from the user
     */
    private function userInputPrompt()
    {
        $this->setUserInput(readline("Command: "));
    }


    /**
     * function to get the user input and send it to CommandInterpreter to be
     * interpreted and sent to database
     */
    private function redirectInput()
    {
        $command_interpreter_instance = new CommandInterpreter();
        $command_interpreter_instance->setUserInput($this->getUserInput());
    }

    /**
     * function that calls userInputPrompt to get the command to execute
     * and then redirects the input to CommandInterpreter class
     */
    public function mainMethod()
    {
        $this->userInputPrompt();
        $this->redirectInput();
    }
}

$user_interface_instance = new UserInterface();
while (true) {
    $user_interface_instance->mainMethod();
}