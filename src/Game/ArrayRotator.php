<?php

namespace App\Game;

#use App\Game\BoardFactory;

class ArrayRotator
{
    /**
     * @param array<array> $array
     * @return array<array>
     */
    public function rotate90(array $array, bool $clockwise=true)
    {
        $result = [];
        $array = $this->flip_diagonal($array);
        foreach ($array as $line){
            $result[] = $this->reverse_line($line);
        }

        return $result;
    }

    /**
     * @param array<array> $array
     * @return array<array>
     */
    public function flip_diagonal(array $array)
    {
        $result = [];
        $height = count($array);
        $width = count($array[0]);

        for ($i=0; $i<$width; $i++){
            for ($j=0; $j<$height; $j++){
                $result[$i][$j] = $array[$j][$i];
            }
        }
        return $result;
    }

    /**
     * @param array<mixed[int, string]> $array
     * @return array<mixed[int, string]>
     */
    public function reverse_line(array $array)
    {
        $result = [];
        $length = count($array);
        for ($i=0; $i<$length; $i++){
            $result[$i] = $array[$length-$i-1];
        }
        return $result;
    }


    /*public function rotate45(string $array): array
    {
        $result = [];
        
    }*/
}