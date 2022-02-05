<?php
require_once "../vendor/autoload.php";

use ToDoListUsers\Ask\AskTodoFunctions;
use ToDoListUsers\Ask\AskUserFunctions;
use ToDoListUsers\ToDo\Todo;
use ToDoListUsers\ToDo\TodoList;
use ToDoListUsers\User\User;

$askUser = new AskUserFunctions();
$user = new User($askUser->askUsername(), new TodoList());

$askTodo = new AskTodoFunctions();

$askIfNew = $askTodo->askIfNewTodo();
while ($askIfNew !== 'n') {
    $user->todoList->addTodo(new Todo($askTodo->askTodoTitle(), $askTodo->askTodoDescription()));
    $user->todoList->printRender();
    sleep(1);
    $askIfNew = $askTodo->askIfNewTodo();
}
if ($user->todoList->todos) {
    if ($askTodo->askIfSearchTodo() !== 'n') {
        $user->todoList->printResults($user->todoList->search($askTodo->askSearchTodo()));
    }
}
