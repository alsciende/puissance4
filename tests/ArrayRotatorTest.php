<?php

namespace App\Tests;

use App\Game\BoardFactory;
use App\Game\ArrayRotator;
use App\Game\BoardSerializer;
use PHPUnit\Framework\TestCase;

class ArrayRotatorTest extends TestCase
{
    /**
     * @dataProvider provideDataRotate90
     */
    public function testArrayRotator90($input, $expected): void
    {
        $rotator = new ArrayRotator();

        $this->assertEquals($expected, $rotator->rotate90($input));

    }
    
    public function provideDataRotate90(): array
    {
        return [
            [
                [[1, 2], [3, 4]],
                [[3, 1], [4, 2]],
            ],
            [
                [[1, 2, 3], [4, 5, 6]],
                [[4, 1], [5, 2], [6, 3]],
            ],
            [
                [[1, 2], [3, 4], [5, 6]],
                [[5, 3, 1], [6, 4, 2]],
            ],
            ];
    }

    /**
     * @dataProvider provideDataFlipDiag
     */
    public function testArrayFlipDiag($input, $expected): void
    {
        $rotator = new ArrayRotator();

        $this->assertEquals($expected, $rotator->flipDiagonal($input));

    }
    
    public function provideDataFlipDiag(): array
    {
        return [
            [
                [[1, 2], [3, 4]],
                [[1, 3], [2, 4]],
            ],
            [
                [[1, 2, 3], [4, 5, 6]],
                [[1, 4], [2, 5], [3, 6]],
            ],
            [
                [[1, 2], [3, 4], [5, 6]],
                [[1, 3, 5], [2, 4, 6]],
            ],
            ];
    }

    /**
     * @dataProvider provideDataRotate45
     */
    public function testArrayRotate45($input, $expected): void
    {
        $rotator = new ArrayRotator();

        $this->assertEquals($expected, $rotator->rotate45($input));

    }
    
    public function provideDataRotate45(): array
    {
        return [
            [
                [[1, 2], [3, 4]],
                [[1], [3, 2], [4]],
            ],
            [
                [[1, 2, 3], [4, 5, 6], [7, 8, 9]],
                [[1], [4, 2], [7, 5, 3], [8, 6], [9]],
            ],
            [
                [[1, 2, 3], [4, 5, 6]],
                [[1], [4, 2], [5, 3], [6]],
            ],
            [
                [[1, 2], [3, 4], [5, 6]],
                [[1], [3, 2], [5, 4], [6]],
            ],
            ];
    }
}