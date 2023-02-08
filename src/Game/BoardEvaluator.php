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

        $orthogonal = $this->checkOrthogonal($board);
        $diagonal = $this->checkDiagonal($board);
        foreach ([$orthogonal, $diagonal] as $direction){
            foreach ($direction as $key => $item){
                if ($item > $s[$key]) {
                    $s[$key] = $item;
                }
            }
        }
        return $s;
    }

    /**
     * @param array<array> $board
     * @return array<string, int>
     */
    private function checkOrthogonal($board)
    {
        $s = ['A'=> 0, 'B'=> 0];

        for ($i=0; $i<2; $i++){
            $previous = null;
            $streaks = ['A'=> 1, 'B'=> 1];

            foreach ($board as $line){
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
            $rotator = new ArrayRotator();
            $board = $rotator->rotate90($board);
        }


        return $s;
    }

    /**
     * @param array<array> $board
     * @return array<string, int>
     */
    private function checkDiagonal($board)
    {
        $s = ['A'=> 0, 'B'=> 0];



        return $s;
    }
}
