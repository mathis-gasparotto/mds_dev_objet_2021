<?php

namespace ToDoListUsers\User;

use ToDoListUsers\ToDo\TodoList;

class User
{
    public function __construct(public string $username, public TodoList $todoList) {
    }
}