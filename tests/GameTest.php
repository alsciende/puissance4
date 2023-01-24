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
        $board = $game->getNewBoard();
        $this->assertIsArray($board);

        // nb of columns
        $this->assertEquals(7, count($board));

        // nb of rows in each column
        $this->assertEquals(6, count($board[0]));

        // first player is A, second player is B
        $this->assertEquals('A', $game->getActivePlayer());
    }

    public function testPlay(): void
    {
        $game = new Game();

        // play as active player in 4th column
        $this->assertEquals('A', $game->getActivePlayer());
        $game->play(3);
        $board = $game->getNewBoard();
        $this->assertEquals('A', $board[3][0]);

        $this->assertEquals('B', $game->getActivePlayer());
        $game->play(3);
        $board = $game->getNewBoard();
        $this->assertEquals('B', $board[3][1]);
    }

    public function testSerialize(): void
    {
        $game = new Game();

        // 7*6 markers of empty position
        $this->assertEquals('..........................................', $game->serialize());

        $game->play(3);

        // serialize left to right, bottom to top
        $serialization = $game->serialize();
        $this->assertEquals('..................A.......................', $serialization);

        // deserialize game
        $resumedGame = new Game($serialization);

        // same board state after deserialization
        $this->assertEquals('..................A.......................', $resumedGame->serialize());
        $this->assertEquals('B', $resumedGame->getActivePlayer());

        // next play
        $resumedGame->play(3);
        $this->assertEquals('..................AB......................', $resumedGame->serialize());
    }
}
