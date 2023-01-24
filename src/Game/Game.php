<?php

namespace App\Game;

class Game
{   
    public string $activePlayer = 'A';
    public array $board = array();
    
    public function __construct(string $serialCode = '..........................................')
    {
        for ($i = 0; $i<7; $i++)
        {
            $this->board[$i] = array();
            for ($j=0; $j<6; $j++)
            {
                $this->board[$i][$j] = $serialCode[6*$i + $j];
            }
        }
        if (substr_count($serialCode, 'A') > substr_count($serialCode, 'B')) {
            $this->activePlayer = 'B';
        }
    }

    public function getNewBoard(): array
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

    public function endTurn(): void
    {
        if ($this->activePlayer == 'A'){
            $this->activePlayer = 'B';
        } else {
            $this->activePlayer = 'A';
        }
    }

    public function serialize(): string
    {
        $string = '';
        foreach ($this->board as $column)
        {
            foreach ($column as $square)
            {
                $string = $string . $square;
            }

        }
        return $string;
    }
}