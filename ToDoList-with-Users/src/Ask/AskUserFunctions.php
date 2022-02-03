<?php

namespace ToDoListUsers\Ask;

use function Termwind\{ask};

class AskUserFunctions
{
    public function askUsername(): string{
        $username = ask(<<<HTML
                <span class="mt-1 ml-2 mr-1 bg-green px-1 text-black">
                    What is your username?
                </span>
            HTML);
        if (!$username) {
            return $this->askUsername();
        }
        return $username;
    }
}