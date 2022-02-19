<?php

namespace App;

class Queue implements QueueInterface
{
    private array $queue = [];
	
    public function __construct(...$elements)
    {
        $this->enqueue(...$elements);
    }

    public function enqueue(...$elements): void
    {
        foreach ($elements as $elem) {
            $this->queue[] = $elem;
        }
    }


    public function dequeue()
    {
        if (!isset($this->queue[0])) {
            return null;
        }

        return array_shift($this->queue);
    }


    public function peek()
    {
        return $this->queue[0] ?? null;
    }

    public function isEmpty(): bool
    {
        return !isset($this->queue[0]);
    }

    public function copy(): Queue
    {
        return new Queue(...$this->queue);
    }

    public function __toString(): string
    {
        $textRepresentationQueue = "[";
        $arrow = "<-";
        foreach ($this->queue as $i => $iValue) {
            if ($i === count($this->queue) - 1) {
                $arrow = "";
            }
            $textRepresentationQueue .= $iValue . $arrow;
        }

        return $textRepresentationQueue . "]";
    }
}
