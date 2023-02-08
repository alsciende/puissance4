<?php

namespace App\Game;

use App\Game\BoardFactory;
use App\Game\BoardEvaluator;
use App\Game\BoardSerializer;

class Game
{   
    public string $activePlayer = 'A';
    public array $board = array();
    

    public function __construct(string $serialization = '..........................................')
    {
        $factory = new BoardFactory();

        if (substr_count($serialization, 'A') > substr_count($serialization, 'B')) {
            $this->activePlayer = 'B';
        }
        
        $this->board = $factory->buildBoard($serialization);
    
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

    public function play(int $column): int
    {
        if ($this->board[$column][5] != '.'){
            return -1;
        }
        
        $n = 0;
        for ($n; $n<6; $n++)
        {
            if ($this->board[$column][$n] == '.'){
                break;
            }
        }

        $this->board[$column][$n] = $this->activePlayer;
        $this->endTurn();
        return 0;
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