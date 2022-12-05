<?php

namespace Robertogallea\AdventOfCode2022;

class Day3 extends Day
{

    public function execute(string $data)
    {
        $total = 0;

        $lines = preg_split("/\r\n|\n|\r/", $data);

        foreach ($lines as $line) {
            $rucksack1 = substr($line, 0, strlen($line) >> 1);
            $rucksack2 = substr($line, strlen($line) >> 1);

            foreach (str_split($rucksack1) as $char) {
                $isInCommon = str_contains($rucksack2, $char);
                if ($isInCommon) {
                    if (strtolower($char) == $char) {
                        $total += (ord($char) - ord('a') + 1);
                    } else {
                        $total += (ord($char) - ord('A') + 27);
                    }
                    break;
                }
            }
        }

        return $total;
    }

    public function execute2(string $data)
    {
        $total = 0;

        $lines = preg_split("/\r\n|\n|\r/", $data);

        $groups = [];
        $group = [];

        foreach ($lines as $i => $line) {
            $group[] = $line;
            if ($i % 3 == 2) {
                $groups[] = $group;
                $group = [];
            }
        }

        foreach ($groups as $group) {
            foreach (str_split($group[0]) as $char) {
                $isInCommon1 = str_contains($group[1], $char);
                $isInCommon2 = str_contains($group[2], $char);
                if ($isInCommon1 && $isInCommon2) {
                    if (strtolower($char) == $char) {
                        $total += (ord($char) - ord('a') + 1);
                    } else {
                        $total += (ord($char) - ord('A') + 27);
                    }
                    break;
                }
            }
        }

        return $total;
    }
}