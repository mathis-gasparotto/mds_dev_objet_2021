<?php

class TodoList {
    public array $todos;

    public function showCompleted() :array{
        return array_filter($this->todos, function(Todo $todo) {
            return $todo->isCompleted();
        });
    }

    public function showNotCompleted() :array{
        return array_filter($this->todos, function(Todo $todo) {
            return $todo->isNotCompleted();
        });
    }

    public function setAllCompleted() :self {
        foreach ($this->todos as $todo) {
            $todo->setCompleted();
        }
        return $this;
    }

    public function addTodo(Todo $todo) :self {
        $this->todos[] = $todo;
        return $this;
    }

}