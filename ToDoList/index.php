<?php
require_once "class/Todo.php";
require_once "class/TodoList.php";

$todoList = new TodoList();

$todoList
    ->addTodo((new Todo('titre1', 'description1'))->setCompleted())
    ->addTodo((new Todo('titre2', 'description2'))->setNotCompleted());

var_dump("Affichage des tâches complétées >", $todoList->showCompleted());

var_dump("Recherche de titre1 >", $todoList->search("titre1"));
var_dump("Recherche de titre2 >", $todoList->search("titre2"));
var_dump("Recherche de titre3 >", $todoList->search("titre3"));

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ToDo List PHP</title>
</head>
<body>
<ul>
    <h2>A faire</h2>
    <?php
    foreach ($todoList->showCompleted() as $todo) { ?>
        <li>
            <?php echo $todo->title." - ".$todo->description; ?>
        </li>
    <?php } ?>

</ul>
<ul>
    <h2>Déjà fait</h2>
    <?php
    foreach ($todoList->showNotCompleted() as $todo) { ?>
        <li>
            <?php echo $todo->title." - ".$todo->description; ?>
        </li>
    <?php } ?>

</ul>
</body>
</html>
