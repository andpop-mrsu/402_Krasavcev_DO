<?php

namespace App;

class Fraction
{
    private int $num;
    private int $denom;
    public function __construct(int $num, int $denom)
    {
        if ($denom <= 0) {
            echo "Ошибка!\n";
            exit();
        }
        $this -> ffraction($num, $denom);
    }
    private function ffraction($num, $denom)
    {
        $factor = $this -> gr($num, $denom);
        if ($factor == 1) {
            $this -> num = $num;
            $this -> denom = $denom;
        } else {
            $this -> num = $num / $factor;
            $this -> denom = $denom / $factor;
        }
    }

    public function getNumer(): int
    {
        return $this -> num;
    }

    public function getDenom(): int
    {
        return $this -> denom;
    }

    private function gr($a, $b): int
    {
        return ($a % $b) ? $this -> gr($b, $a % $b) : abs($b);
    }

    public function add(Fraction $frac): Fraction
    {
        $num = $frac -> denom * $this -> num + $this -> denom * $frac -> num;
        $denom = $this -> denom * $frac -> denom;
        return new Fraction($num, $denom);
    }

    public function sub(Fraction $frac): Fraction
    {
        $num = $frac -> denom * $this -> num - $this -> denom * $frac -> num;
        $denom = $this -> denom * $frac -> denom;
        return new Fraction($num, $denom);
    }

    private function convert(): string
    {
        $integerPart = intval($this -> num / $this -> denom);
        $num = abs($this -> num % $this -> denom);
        return $integerPart . "'" . $num . "/" . $this -> denom;
    }

    public function __toString(): string
    {
        if (abs($this -> num) > $this -> denom) {
            return $this -> convert();
        }

        return $this -> num . "/" . $this -> denom;
    }
}
