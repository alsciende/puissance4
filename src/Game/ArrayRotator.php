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
        $array = $this->flipDiagonal($array);
        foreach ($array as $line){
            $result[] = $this->reverseLine($line);
        }

        return $result;
    }

    /**
     * @param array<array> $array
     * @return array<array>
     */
    public function flipDiagonal(array $array)
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
     * @param array<mixed[]> $array
     * @return array<mixed[]>
     */
    public function reverseLine(array $array)
    {
        $result = [];
        $length = count($array);
        for ($i=0; $i<$length; $i++){
            $result[$i] = $array[$length-$i-1];
        }
        return $result;
    }

    /**
     * @param array<mixed[]> $array
     * @return array<mixed[]>
     */
    public function rotate45(array $array): array
    {
        $result = [];
        $height = count($array);
        $width = count($array[0]);
        $smaller = min($height, $width);
        $bigger = max($height, $width);

        for ($n=0; $n<$bigger+($smaller-1); $n++)
        {
            for ($i=$n, $j=0; $i>=0; $i--, $j++)
            {
                if ($i<=$height-1 && $j<=$width-1){
                    $result[$n][] = $array[$i][$j];
                }
            }
        }
        return $result;
    }
}