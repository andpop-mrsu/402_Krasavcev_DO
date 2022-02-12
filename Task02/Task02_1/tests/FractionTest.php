<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Fraction;

class FractionTest extends TestCase
{
    public function testReduction()
    {
        $p = new Fraction(54, 544);
        $this -> assertSame(27, $p -> getNumer());
        $this -> assertSame(272, $p -> getDenom());
    }

    public function testTextRepresentation()
    {
        $p1 = new Fraction(5, 25);
        $p2 = new Fraction(50, 4);
        $this -> assertSame("1/5", $p1 -> __toString());
        $this -> assertSame("12'1/2", $p2 -> __toString());
    }

    public function testAdding()
    {
        $p1 = new Fraction(5, 25);
        $p2 = new Fraction(50, 4);
        $p3 = $p1 -> add($p2);
        $this -> assertEquals("12'7/10", $p3);
    }

    public function testSubtraction()
    {
        $p1 = new Fraction(5, 25);
        $p2 = new Fraction(123, 32);
        $p3 = $p1 -> sub($p2);
        $this -> assertEquals("-3'103/160", $p3);
        $p4 = new Fraction(50, 4);
        $p5 = $p1 -> sub($p4);
        $this -> assertEquals("-12'3/10", $p5);
    }
}
