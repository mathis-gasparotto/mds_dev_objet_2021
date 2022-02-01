<?php
require_once "class/Todo.php";
require_once "class/TodoList.php";

$toto1 = new Todo('titre1', 'description1');
$toto1->setCompleted();
$toto2 = new Todo('titre2', 'description2');
$toto2->setNotCompleted();

$todoList = new TodoList();
$todoList->addTodo($toto1);
$todoList->addTodo($toto2);
/*
$todoList
    ->addTodo(new Todo('titre1', 'description1'))
    ->addTodo(new Todo('titre2', 'description2'));
*/
var_dump($todoList->showNotCompleted());

