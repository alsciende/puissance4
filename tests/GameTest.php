<?php

namespace App\Tests;

use App\Game\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testProperties(): void
    {
        $game = new Game();

        // board
        $board = $game->getBoard();
        $this->assertIsArray($board);

        // nb of columns
        $this->assertEquals(7, count($board));

        // nb of rows in each column
        $this->assertEquals(6, count($board[0]));

        // first player is 0, second player is 1
        $this->assertEquals(0, $game->getActivePlayer());
    }
}
