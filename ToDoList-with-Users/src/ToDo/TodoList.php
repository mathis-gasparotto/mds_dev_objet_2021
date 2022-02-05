<?php
namespace ToDoListUsers\ToDo;

use function Termwind\{render};

class TodoList
{
    public array $todos = [];

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
        if (!$search) {
            return "No results found";
        }
        return $search;
    }

    public function printNotCompleted(): string {
        $result = "<ul>";
        foreach ($this->showNotCompleted() as $todo) {
            $result = $result."<li>".$todo->title." - ".$todo->description."</li>";
        }
        return $result."</ul>";
    }

    public function printCompleted(): string {
        $result = "<ul>";
        foreach ($this->showCompleted() as $todo) {
            $result = $result."<li>".$todo->title." - ".$todo->description."</li>";
        }
        return $result."</ul>";
    }

    public function printRender(): void {
        render(<<<'HTML'
            <p>Your To-dos:</p>
            <p>To-do</p>
        HTML);
        render($this->printNotCompleted());
        render(<<<'HTML'
            <p>Already done</p>
        HTML);
        render($this->printCompleted());
    }

    public function printResults(array|string $resultSearch): void {
        render(<<<'HTML'
            <p>Result(s) of your search</p>
        HTML);
        if (is_array($resultSearch)) {
            $resultToPrint = "<ul>";
            foreach ($resultSearch as $todo) {
                $resultToPrint = $resultToPrint."<li>".$todo->title." - ".$todo->description."</li>";
            }
            render($resultToPrint."</ul>");
        } else {
            $resultToPrint = "<p>".$resultSearch."</p>";
            render($resultToPrint);
        }
    }
}