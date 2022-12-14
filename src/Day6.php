<?php

namespace Robertogallea\AdventOfCode2022;

class Day6 extends Day
{

    public function execute(string $data)
    {
        return $this->getStartPosition($data, 4);
    }

    public function execute2(string $data)
    {
        return $this->getStartPosition($data, 14);
    }

    /**
     * @param string $data
     * @return int|null
     */
    public function getStartPosition(string $data, int $len): ?int
    {
        for ($i = 0; $i < strlen($data) - $len; $i++) {
            $sub = substr($data, $i, $len);
            $result = array_count_values(str_split($sub));
            arsort($result);
            if (sizeof($result) == $len) {
                return $i + $len;
            }
        }

        return null;
    }

}