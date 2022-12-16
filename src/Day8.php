<?php

namespace Robertogallea\AdventOfCode2022;

class Day8 extends Day
{

    public function execute(string $data)
    {
        $grid = [];

        $lines = preg_split("/\r\n|\n|\r/", $data);

        foreach ($lines as $line) {
            if ($line != '') {
                $row = str_split($line);
                $grid[] = $row;
            }
        }

        $visibleCount = 2 * (sizeof($grid) + (sizeof($grid[0]) - 2));

        for ($i = 1; $i < sizeof($grid) - 1; $i++) {
            for ($j = 1; $j < sizeof($grid[$i]) - 1; $j++) {
                if ($this->isVisible($i, $j, $grid)) {
                    $visibleCount++;
                }
            }
        }

        return $visibleCount;
    }

    public function execute2(string $data)
    {
        $grid = [];

        $lines = preg_split("/\r\n|\n|\r/", $data);

        foreach ($lines as $line) {
            if ($line != '') {
                $row = str_split($line);
                $grid[] = $row;
            }
        }

        $maxCount = 0;

        for ($i = 0; $i < sizeof($grid); $i++) {
            for ($j = 0; $j < sizeof($grid[$i]); $j++) {
                $count = $this->countVisible($i, $j, $grid);
                $maxCount = max($maxCount, $count);
            }
        }

        return $maxCount;

    }

    private function isVisible(int $i, int $j, array $grid)
    {
        return ($this->isVisibleFromTop($i, $j, $grid) ||
            $this->isVisibleFromBottom($i, $j, $grid) ||
            $this->isVisibleFromLeft($i, $j, $grid) ||
            $this->isVisibleFromRight($i, $j, $grid));
    }

    private function isVisibleFromTop(int $i, int $j, array $grid)
    {
        for ($ii = 0; $ii < $i; $ii++) {
            if ($grid[$ii][$j] >= $grid[$i][$j]) {
                return false;
            }
        }

        return true;
    }

    private function isVisibleFromBottom(int $i, int $j, array $grid)
    {
        for ($ii = $i + 1; $ii < sizeof($grid[$i]); $ii++) {
            if ($grid[$ii][$j] >= $grid[$i][$j]) {
                return false;
            }
        }

        return true;
    }

    private function isVisibleFromLeft(int $i, int $j, array $grid)
    {
        for ($jj = 0; $jj < $j; $jj++) {
            if ($grid[$i][$jj] >= $grid[$i][$j]) {
                return false;
            }
        }

        return true;
    }

    private function isVisibleFromRight(int $i, int $j, array $grid)
    {
        for ($jj = $j + 1; $jj < sizeof($grid); $jj++) {
            if ($grid[$i][$jj] >= $grid[$i][$j]) {
                return false;
            }
        }

        return true;
    }

    private function countVisible(int $i, int $j, array $grid)
    {
        return ($this->countVisibleFromTop($i, $j, $grid) ||
            $this->countVisibleFromBottom($i, $j, $grid) ||
            $this->countVisibleFromLeft($i, $j, $grid) ||
            $this->countVisibleFromRight($i, $j, $grid));
    }

    private function countVisibleFromTop(int $i, int $j, array $grid)
    {
        for ($ii = 0; $ii < $i; $ii++) {
            if ($grid[$ii][$j] > $grid[$i][$j]) {
                return $i - $ii;
            }
        }

        return $i;
    }

    private function countVisibleFromBottom(int $i, int $j, array $grid)
    {
        for ($ii = $i + 1; $ii < sizeof($grid[$i]); $ii++) {
            if ($grid[$ii][$j] > $grid[$i][$j]) {
                return $ii - $i;
            }
        }

        return sizeof($grid) - $ii - 1;
    }

    private function countVisibleFromLeft(int $i, int $j, array $grid)
    {
        for ($jj = 0; $jj < $j; $jj++) {
            if ($grid[$i][$jj] > $grid[$i][$j]) {
                return $j - $jj;
            }
        }

        return $j;
    }

    private function countVisibleFromRight(int $i, int $j, array $grid)
    {
        for ($jj = $j + 1; $jj < sizeof($grid); $jj++) {
            if ($grid[$i][$jj] > $grid[$i][$j]) {
                return $jj - $j;
            }
        }

        return sizeof($grid[$i]) - $jj - 1;
    }
}