<?php
require_once "../vendor/autoload.php";

use ToDoListUsers\Ask\AskTodoFunctions;
use ToDoListUsers\Ask\AskUserFunctions;
use ToDoListUsers\ToDo\Todo;
use ToDoListUsers\ToDo\TodoList;
use ToDoListUsers\User\User;
use function Termwind\{render};

$todoList = new TodoList();

$askUser = new AskUserFunctions();
$user = new User($askUser->askUsername());

$askTodo = new AskTodoFunctions();

while ($askTodo->askIfNewTodo() !== 'n') {
    $todoList->addTodo(new Todo($askTodo->askTodoTitle(), $askTodo->askTodoDescription()));
}
render(<<<'HTML'
    <p>Todo</p>
HTML);
render($todoList->printNotCompleted());
render(<<<'HTML'
    <p>Already done</p>
HTML);
render($todoList->printCompleted());

if ($askTodo->askIfSearchTodo() !== 'n') {
    $resultArray = $todoList->search($askTodo->askSearchTodo());
    render(<<<'HTML'
        <p>Result(s) of your search</p>
    HTML);
    $result = "<ul>";
    foreach ($resultArray as $todo) {
       $result = $result."<li>".$todo->title." - ".$todo->description."</li>";
    }
    render($result."</ul>");
}