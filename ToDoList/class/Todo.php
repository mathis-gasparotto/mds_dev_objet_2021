<?php

class Todo {
    public ?DateTime $completed_at = null;
    
    public function __construct(
        public string $title,
        public ?string $description,
    ){}

    public function setCompleted() :self {
        $this->completed_at = new DateTime();
        return $this;
    }
    public function setNotCompleted() :self {
        $this->completed_at = null;
        return $this;
    }
    public function isCompleted() :bool {
        return $this->completed_at !== null;
    }
    public function isNotCompleted() :bool {
        return $this->completed_at === null;
    }
}
