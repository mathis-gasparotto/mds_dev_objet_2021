<?php

class TodoList
{
    public array $todos;

    public function filter(callable $filterFunction): array
    {
        return array_filter($this->todos, $filterFunction);
    }

    public function showCompleted(): array
    {
        return $this->filter(fn(Todo $todo) => $todo->isCompleted());
    }

    public function showNotCompleted(): array
    {
        return $this->filter(fn(Todo $todo) => !$todo->isCompleted());
    }

    public function setAllCompleted(): self
    {
        foreach ($this->todos as $todo) {
            $todo->setCompleted();
        }
        return $this;
    }

    public function addTodo(Todo $todo): self
    {
        $this->todos[] = $todo;
        return $this;
    }

    public function search(string $searchText): array|string
    {
        $search = $this->filter(fn(Todo $todo) => str_contains($todo->title.$todo->description, $searchText));
        if (empty($search)) {
            return "Aucun résultat trouvé";
        }
        return $search;
    }

}