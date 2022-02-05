<?php

namespace App\Test;

use App\Fraction;

function runTest()
{
    $m1 = new Fraction(5, 25);
    echo $m1 . "\n"; // 1/5

    $m2 = new Fraction(50, 4);
    echo $m2 . "\n"; // 12'1/2

    $m3 = $m1 -> add($m2);
    echo $m3 . "\n"; // 12'7/10

    $m4 = new Fraction(123, 32);
    $m5 = $m1 -> sub($m4);
    echo $m5 . "\n"; // -3'103/160

    $m6 = new Fraction(54, 544);
    echo $m6 . "\n"; // 27/272
    echo $m6 -> getNumer() . "\n"; // 27
    echo $m6 -> getDenom() . "\n"; // 272

    $m7 = $m1 -> sub($m2);
    echo $m7 . "\n"; // -12'3/10
}
