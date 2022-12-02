<?php

namespace Robertogallea\AdventOfCode2022;

require __DIR__ .'/../vendor/autoload.php';

class Day1 extends Day
{
    public function execute(string $data)
    {
        $calories = $this->getCalories($data);

        return max($calories);
    }

    public function execute2(string $data)
    {
        $calories = $this->getCalories($data);

        $max1 = max($calories);
        $index = array_search($max1, $calories);
        unset($calories[$index]);

        $max2 = max($calories);
        $index = array_search($max2, $calories);
        unset($calories[$index]);

        $max3 = max($calories);
        $index = array_search($max3, $calories);
        unset($calories[$index]);

        return $max1 + $max2 + $max3;


    }

    /**
     * @param string $data
     * @return array
     */
    public function getCalories(string $data): array
    {
        $calories = [];
        $lines = preg_split("/\r\n|\n|\r/", $data);
        $total = 0;

        foreach ($lines as $line) {
            if ($line === '') {
                $calories[] = $total;
                $total = 0;
            } else {
                $total += (int)$line;
            }
        }
        $calories[] = $total;

        return $calories;
    }
}

