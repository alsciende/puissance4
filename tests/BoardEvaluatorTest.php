<?php

namespace App\Tests;

use App\Game\BoardEvaluator;
use App\Game\BoardFactory;
use PHPUnit\Framework\TestCase;

class BoardEvaluatorTest extends TestCase
{
    /**
     * @dataProvider provideData
     */
    public function testBoardEvaluator($input, $expected): void
    {
        $factory = new BoardFactory();
        $board = $factory->buildBoard($input);
        $evaluator = new BoardEvaluator();

        $this->assertEquals(
            $expected,
            $evaluator->getLongestActualSequences($board)
        );
    }

    public function provideData(): array
    {
        return [
            [
                '......' .
                '......' .
                '......' .
                '......' .
                '......' .
                '......' .
                '......',
                [
                    'A' => 0,
                    'B' => 0
                ]
            ],
            [
                '......' .
                '......' .
                'A.....' .
                'A.....' .
                'A.....' .
                '......' .
                '......',
                [
                    'A' => 3,
                    'B' => 0
                ]
            ],
            [
                '......' .
                '......' .
                '......' .
                'BBB...' .
                '......' .
                '......' .
                '......',
                [
                    'A' => 0,
                    'B' => 3
                ]
            ],
            [
                '......' .
                'BBA...' .
                'BA....' .
                'A.....' .
                '......' .
                '......' .
                '......',
                [
                    'A' => 3,
                    'B' => 2
                ]
            ],
            [
                '......' .
                'B.....' .
                'AB....' .
                'BAB...' .
                'B.....' .
                '......' .
                '......',
                [
                    'A' => 2,
                    'B' => 3
                ]
            ],
        ];
    }
}