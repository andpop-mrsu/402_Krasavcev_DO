<?php

namespace App;

interface QueueInterface
{
    public function enqueue(...$elements): void;

    public function dequeue();

    public function peek();

    public function isEmpty(): bool;

    public function copy(): Queue;

    public function __toString(): string;
}
