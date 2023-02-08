<?php

namespace App\Game;

class BoardSerializer
{
    const MAPPING = [
        'A' => 'A',
        'B' => 'B',
        null => '.',
    ];

    public function serialize($board): string
    {
        $string = '';
        foreach ($board as $column)
        {
            foreach ($column as $square)
            {
                $string = $string . $this::MAPPING[$square];
            }

        }
        return $string;
    }
}