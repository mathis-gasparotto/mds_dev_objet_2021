<?php

namespace ToDoListUsers\Ask;

use function Termwind\{ask};

class AskTodoFunctions
{

    public function askIfNewTodo(): ?string {
        return ask(<<<HTML
            <span class="mt-1 ml-2 mr-1 bg-green px-1 text-black">
                Do you want to add a new to-do? (Y/n)
            </span>
        HTML);
    }
    public function askTodoTitle(): string {
        $todoTitle = ask(<<<HTML
            <span class="mt-1 ml-2 mr-1 bg-green px-1 text-black">
                Title:
            </span>
        HTML);
        if (!$todoTitle) {
            return $this->askTodoTitle();
        }
        return $todoTitle;
    }
    public function askTodoDescription(): string {
        $todoDesc = ask(<<<HTML
            <span class="mt-1 ml-2 mr-1 bg-green px-1 text-black">
                Description:
            </span>
        HTML);
        if (!$todoDesc) {
            return $this->askTodoDescription();
        }
        return $todoDesc;
    }

    public function askIfSearchTodo(): ?string {
        return ask(<<<HTML
            <span class="mt-1 ml-2 mr-1 bg-green px-1 text-black">
                Do you want to search a to-do? (Y/n)
            </span>
        HTML);
    }
    public function askSearchTodo(): string {
        $searchTodo = ask(<<<HTML
            <span class="mt-1 ml-2 mr-1 bg-green px-1 text-black">
                Title or description:
            </span>
        HTML);
        if (!$searchTodo) {
            return $this->askTodoDescription();
        }
        return $searchTodo;
    }
}