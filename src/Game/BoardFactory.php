<?php

namespace App\Game;

use App\Game\BoardSerializer;

class BoardFactory
{
    const MAPPING = [
        'A' => 'A',
        'B' => 'B',
        '.' => null,
    ];

    /**
     * @param string $serialization
     * @return array<int, array<int, string|null>>
     */
    public function buildBoard(string $serialization = '..........................................')
    {
        return array_map(
            fn ($chars) => $this->buildColumn($chars),
            str_split($serialization, 6)
        );
    }


    /**
     * @param string $serialization
     * @return array<int, string|null>
     */
    private function buildColumn(string $serialization)
    {
        return array_map(
            fn ($char) => self::MAPPING[$char],
            str_split($serialization, 1)
        );
    }
}