<?php

namespace Robertogallea\AdventOfCode2022;

class Day12 extends Day
{

    public function execute(string $data)
    {
        [$map, $start, $end] = $this->getMap($data);
        return $this->solve($map, $start, $end);
    }

    public function execute2(string $data)
    {
        [$map, , $end] = $this->getMap($data);

        $dists = [];

        for ($i = 0; $i < sizeof($map); $i++) {
            $dists[] = $this->solve($map, new Coordinate(0, $i), $end);
        }

        return min($dists);
    }

    private function getMap(string $data)
    {
        $lines = preg_split("/\r\n|\n|\r/", $data);

        $i = 0;
        foreach ($lines as $line) {
            if ($line != '') {
                for ($j = 0; $j < strlen($line); $j++) {
                    if ($line[$j] == 'S') {
                        $start = new Coordinate($j, $i);
                        $map[$i][$j] = 0;
                    } elseif ($line[$j] == 'E') {
                        $end = new Coordinate($j, $i);
                        $map[$i][$j] = ord('z') - ord('a');
                    } else {
                        $map[$i][$j] = ord($line[$j]) - ord('a');
                    }
                }
                $i++;
            }
        }

        return [$map, $start, $end];
    }

    private function solve(array $grid, Coordinate $startPos, Coordinate $endPos): string
    {
        $dists = [$startPos->str() => 0];
        $visitQueue = [$startPos];

        /** @var Coordinate $current */
        while (($current = \array_shift($visitQueue)) !== null) {
            $currentDist = $dists[$current->str()];

            foreach (['up', 'right', 'down', 'left'] as $dir) {
                $next = $current->$dir();
                // can go to next field AND is visiting next element with less steps than before
                if ($this->canGo($grid, $current, $next) && ($dists[$next->str()] ?? \PHP_INT_MAX) > $currentDist + 1) {
                    $dists[$next->str()] = $currentDist + 1;
                    $visitQueue[] = $next;
                }
            }
        }

        return (string)$dists[$endPos->str()];
    }

    private function canGo(array $grid, Coordinate $current, Coordinate $next): bool
    {
        $nextHeight = $grid[$next->y][$next->x] ?? ord('}');
        $currentHeight = $grid[$current->y][$current->x];

        return $nextHeight - 1 <= $currentHeight;
    }
}

class Coordinate
{
    public function __construct(public int $x, public int $y)
    {
    }

    public function str(): string
    {
        return "{$this->x}:{$this->y}";
    }

    public function up(): static
    {
        return new static($this->x, $this->y - 1);
    }

    public function down(): static
    {
        return new static($this->x, $this->y + 1);
    }

    public function right(): static
    {
        return new static($this->x + 1, $this->y);
    }

    public function left(): static
    {
        return new static($this->x - 1, $this->y);
    }
}