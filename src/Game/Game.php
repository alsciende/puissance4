<?php

namespace App\Game;

use App\Game\BoardFactory;
use App\Game\BoardEvaluator;
use App\Game\BoardSerializer;

class Game
{   
    public string $activePlayer = 'A';
    public array $board = array();
    public int $x;
    public int $y;
    

    public function __construct(string $serialization = '..........................................')
    {
        $factory = new BoardFactory();

        if (substr_count($serialization, 'A') > substr_count($serialization, 'B')) {
            $this->activePlayer = 'B';
        }
        
        $this->board = $factory->buildBoard($serialization);
        $this->x = 7;
        $this->y = 6;
    
    }

    /**
     * @return array<array>
     */
    public function getBoard()
    {
        return $this->board;
    }

    public function getActivePlayer(): string
    {
        return $this->activePlayer;
    }

    public function play(int $column): void
    {
        if ($this->board[$column][$this->y-1] != '.'){
            # raise or whatever
        }
        
        $n = 0;     # we want to keep this value after the loop
        for ($n; $n<$this->y; $n++)
        {
            if ($this->board[$column][$n] == '.'){
                break;
            }
        }

        $this->board[$column][$n] = $this->activePlayer;
        $this->endTurn();
    }

    private function endTurn(): void
    {
        if ($this->activePlayer == 'A'){
            $this->activePlayer = 'B';
        } else {
            $this->activePlayer = 'A';
        }
    }

    public function serialize(): string
    {
        $serializer = new BoardSerializer();
        return $serializer->serialize($this->board);
    }
}