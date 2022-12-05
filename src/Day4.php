<?php

namespace Robertogallea\AdventOfCode2022;

class Day4 extends Day
{

    public function execute(string $data)
    {
        return $this->executeWith($data, 'contains');
    }

    public function execute2(string $data)
    {
        return $this->executeWith($data, 'totalOverlap');
    }

    private function executeWith($data, $method)
    {
        $total = 0;

        $lines = preg_split("/\r\n|\n|\r/", $data);

        foreach ($lines as $line) {
            [$assignment1, $assignment2] = explode(',', $line);
            if ($overlap = $this->$method($assignment1, $assignment2) || $overlap = $this->$method($assignment2, $assignment1)) {
                $total += $overlap;
            }
        }

        return $total;
    }

    private function contains(string $assignment1, string $assignment2)
    {
        [$start1, $end1] = explode('-', $assignment1);
        [$start2, $end2] = explode('-', $assignment2);

        if (($start1 >= $start2) && ($end1 <= $end2)) {
            return 1;
        }

        return 0;
    }

    private function totalOverlap(string $assignment1, string $assignment2)
    {
        [$start1, $end1] = explode('-', $assignment1);
        [$start2, $end2] = explode('-', $assignment2);

        if (($start1 <= $start2) && ($start2) <= $end1) {
            return $end1 - $start2 + 1;
        }

        return 0;
    }
}