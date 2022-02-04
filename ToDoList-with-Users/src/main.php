<?php
require_once "../vendor/autoload.php";

use ToDoListUsers\Ask\AskTodoFunctions;
use ToDoListUsers\Ask\AskUserFunctions;
use ToDoListUsers\ToDo\Todo;
use ToDoListUsers\ToDo\TodoList;
use ToDoListUsers\User\User;
use function Termwind\{render};

$askUser = new AskUserFunctions();
$user = new User($askUser->askUsername(), new TodoList());

$askTodo = new AskTodoFunctions();

$askIfNew = $askTodo->askIfNewTodo();
while ($askIfNew !== 'n') {
    $user->todoList->addTodo(new Todo($askTodo->askTodoTitle(), $askTodo->askTodoDescription()));
    $askIfNew = $askTodo->askIfNewTodo();
}
if ($user->todoList->todos) {
    render(<<<'HTML'
        <p>Todo</p>
    HTML);
    render($user->todoList->printNotCompleted());
    render(<<<'HTML'
        <p>Already done</p>
    HTML);
    render($user->todoList->printCompleted());

    sleep(1);
    if ($askTodo->askIfSearchTodo() !== 'n') {
        $resultArray = $user->todoList->search($askTodo->askSearchTodo());
        render(<<<'HTML'
            <p>Result(s) of your search</p>
        HTML);
        $result = "<ul>";
        foreach ($resultArray as $todo) {
            $result = $result."<li>".$todo->title." - ".$todo->description."</li>";
        }
        render($result."</ul>");
    }
}
