<?php

namespace ToDoListUsers\User;

class User
{
    public TodoList $todoList;

    public function __construct(public string $username) {
    }
}