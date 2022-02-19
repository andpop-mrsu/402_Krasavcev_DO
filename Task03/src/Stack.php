<?php

namespace App;

use RunTimeException;

class Stack implements StackInterface
{
    protected array $stack;
    protected int $limit;

    public function __construct(int $limit)
    {
        $this->stack = array();
        $this->limit = $limit;
    }

    public function push(...$elements)
    {
        foreach ($elements as $element) {
            if (count($this->stack) < $this->limit) {
                array_unshift($this->stack, $element);
            } else {
                throw new RunTimeException('Стек заполнен', 1);
            }
        }
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return null;
        }

        return array_shift($this->stack);
    }

    public function top()
    {
        return current($this->stack);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }

    public function copy(): Stack
    {
        return $this;
    }

    public function __toString(): string
    {
        $str = "";
        $str .= "[";

        $flag = true;
        foreach ($this->stack as $item) {
            if ($flag) {
                $flag = false;
                $str .= $item;
                continue;
            }
            $str .= "->" . $item;
        }
        $str .= "]";

        return $str;
    }
}