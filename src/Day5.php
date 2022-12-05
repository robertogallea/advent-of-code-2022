<?php

namespace Robertogallea\AdventOfCode2022;

class Day5 extends Day
{

    public function execute(string $data)
    {
        return $this->executeWith($data, 'move1');
    }

    public function execute2(string $data)
    {
        return $this->executeWith($data, 'move2');
    }

    private function getCrates(array $stacks)
    {
        for ($i = 0; $i < strlen($stacks[0]) / 5 + 4; $i++) {
            for ($j = 1; $j < sizeof($stacks); $j++) {
                try {
                    if ($stacks[$j][$i * 4 + 1] != ' ') {
                        $crates[$i+1][$j] = $stacks[$j][$i * 4 + 1];
                    }
                } catch (\Exception $exception) {
                    // string ended
                }
            }
        }

        return $crates;
    }

    private function move1(mixed $crates, mixed $count, mixed $from, mixed $to)
    {
        for ($i=0;$i<$count;$i++) {
            $toMove = array_pop($crates[$from]);
            $crates[$to][] = $toMove;
        }

        return $crates;
    }

    private function move2(mixed $crates, mixed $count, mixed $from, mixed $to)
    {
        $toMove = [];

        for ($i=0;$i<$count;$i++) {
            $toMove[] = array_pop($crates[$from]);
        }

        $crates[$to] = array_merge($crates[$to], array_reverse($toMove));

        return $crates;
    }

    private function executeWith(string $data, string $method)
    {
        $lines = preg_split("/\r\n|\n|\r/", $data);

        $stop = array_search('', $lines, true);

        $stacks = array_reverse(array_slice($lines, 0, $stop));
        $moves = array_slice($lines, $stop + 1);

        $crates = $this->getCrates($stacks);

        foreach ($moves as $move) {
            preg_match_all('/\d+/', $move, $matches);
            [$count, $from, $to] = $matches[0];

            $crates = $this->$method($crates, $count, $from, $to);
        }

        $final = '';

        foreach ($crates as $crate) {
            $final .= array_pop($crate);
        }

        return $final;
    }
}