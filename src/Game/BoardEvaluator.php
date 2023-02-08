<?php

namespace App\Game;

use App\Game\BoardFactory;
use App\Game\ArrayRotator;

class BoardEvaluator
{
    /**
     * @param array<array> $board
     * @return array<string, int>
     */
    public function getLongestActualSequences($board)
    {
        $s = ['A'=> 0, 'B'=> 0];

        $sequences = $this->getLongestSequencePerDirection($board);
        foreach ($sequences as $key => $item){
            if ($item > $s[$key]) {
                $s[$key] = $item;
            }
        }
        
        return $s;
    }

    /**
     * @param array<array> $board
     * @return array<string, int>
     */
    private function getLongestSequencePerDirection($board)
    {
        $rotator = new ArrayRotator();
        $s = ['A'=> 0, 'B'=> 0];
        $shallow_copy = $board;

        for ($i=0; $i<2; $i++){
            for ($j=0; $j<2; $j++){
                $previous = null;
                $streaks = ['A'=> 1, 'B'=> 1];

                foreach ($shallow_copy as $line){
                    foreach ($line as $character){
                        if ($character){

                            if ($character == $previous){
                                $streaks[$character] += 1;

                                if ($s[$character] <= $streaks[$character]){
                                    $s[$character] = $streaks[$character];
                                }
                                } else {
                                $streaks[$character] = 1;
                            }
                        }
                        $previous = $character;
                    }
                }
                $shallow_copy = $rotator->rotate45($shallow_copy); 
            }    
            $shallow_copy = $rotator->rotate90($board);
        }

        return $s;
    }
}
