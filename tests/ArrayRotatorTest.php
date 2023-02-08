<?php

namespace App\Tests;

use App\Game\BoardFactory;
use App\Game\ArrayRotator;
use App\Game\BoardSerializer;
use PHPUnit\Framework\TestCase;

class ArrayRotatorTest extends TestCase
{
    public function testArrayRotator(): void
    {
        $rotator = new ArrayRotator();

        $test1 = [[1, 2], [3, 4]];
        $this->assertEquals([[3, 1], [4, 2]], $rotator->rotate90($test1));
        $this->assertEquals([[1, 3], [2, 4]], $rotator->flip_diagonal($test1));

        $test2 = [[1, 2, 3], [4, 5, 6]];
        $this->assertEquals([[4, 1], [5, 2], [6, 3]], $rotator->rotate90($test2));
        $this->assertEquals([[1, 4], [2, 5], [3, 6]], $rotator->flip_diagonal($test2));

        $test3 = [[1, 2], [3, 4], [5, 6]];
        $this->assertEquals([[5, 3, 1], [6, 4, 2]], $rotator->rotate90($test3));
        $this->assertEquals([[1, 3, 5], [2, 4, 6]], $rotator->flip_diagonal($test3));

    }
}