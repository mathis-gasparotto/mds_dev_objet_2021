<?php

namespace ToDoListUsers;

use ToDoListUsers\ToDo\Todo;
use ToDoListUsers\ToDo\TodoList;
use ToDoListUsers\User\User;
use function Termwind\{ask};

class Cli
{
    public User $user;

    public function run() {
        $this->user = $this->newUser();
        $this->askNewTodo($this->user->todoList);
        $this->askSearchTodo($this->user->todoList);

    }

    private function ask(string $question, bool $require = true): ?string {
        $star = $require ? '*' : '';
        $answer = ask(<<<HTML
            <span class="mt-1 ml-2 mr-1 bg-green px-1 text-black">
                {$question}{$star}:
            </span>
        HTML);
        if (!$answer && $require) {
            return $this->ask($question, $require);
        }
        return $answer;
    }

    public function newUser(): User{
        return new User($this->ask("Username"), new TodoList());
    }

    private function askNewTodo(TodoList $todoList): void
    {
        if ($this->ask("Do you want to add a new to-do? [Y/n]", require: false) === 'n') {
            return;
        }
        $todoList->addTodo(new Todo($this->ask("Title"), $this->ask("Description", require: false)));
        $todoList->printRender($this->user->username);
        sleep(1);
        $this->askNewTodo($todoList);
    }

    private function askSearchTodo(TodoList $todoList): void {
        if ($todoList->todos) {
            if ($this->ask("Do you want to search a to-do? [Y/n]", require: false) === 'n') {
                return;
            }
            $todoList->printResults($todoList->search($this->ask("Title or description:")));
            sleep(1);
            $this->askSearchTodo($todoList);
        }
    }

}