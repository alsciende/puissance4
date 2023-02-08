<?php

namespace App\Tests;

use App\Game\BoardFactory;
use App\Game\BoardSerializer;
use PHPUnit\Framework\TestCase;

class BoardSerializerTest extends TestCase
{
    
    public function testSerialize(): void
    {
        $serializer = new BoardSerializer();
        $factory = new BoardFactory();
        $board = $factory->buildBoard();

        // 7*6 markers of empty position
        $this->assertEquals('..........................................', $serializer->serialize($board));

        // same board state after serialization
        $board = $factory->buildBoard('............AB..A..BBBA...A..B..BB........');
        $this->assertEquals('............AB..A..BBBA...A..B..BB........', $serializer->serialize($board));
    }
}