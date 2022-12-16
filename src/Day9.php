<?php

namespace Robertogallea\AdventOfCode2022;

class Day9 extends Day
{

    public function execute(string $data)
    {
        $ropeSize = 2;
        $start = [0, 0];

        return $this->moveRope($ropeSize, $start, $data);
    }

    public function execute2(string $data)
    {
        $ropeSize = 10;
        $start = [0, 0];

        return $this->moveRope($ropeSize, $start, $data);
    }

    /**
     * @param int $ropeSize
     * @param array $start
     * @param string $data
     * @return int|void
     */
    public function moveRope(int $ropeSize, array $start, string $data)
    {
        for ($i = 0; $i < $ropeSize; $i++) {
            $ropePos[] = $start;
        }

        $seen[] = $start;

        $lines = preg_split("/\r\n|\n|\r/", $data);

        foreach ($lines as $line) {
            if ($line != '') {
                [$direction, $amount] = explode(' ', $line);
                for ($i = 0; $i < $amount; $i++) {
                    switch ($direction) {
                        case 'U':
                            $ropePos[0][0] += 1;
                            break;
                        case 'D':
                            $ropePos[0][0] -= 1;
                            break;
                        case 'L':
                            $ropePos[0][1] -= 1;
                            break;
                        case 'R':
                            $ropePos[0][1] += 1;
                            break;
                        default:
                            die('Invalid direction');
                    }
                    for ($piece = 1; $piece < $ropeSize; $piece++) {
                        $diff[0] = $ropePos[$piece - 1][0] - $ropePos[$piece][0];
                        $diff[1] = $ropePos[$piece - 1][1] - $ropePos[$piece][1];
                        $notTouching = ((abs($diff[0]) > 1) || (abs($diff[1]) > 1));
                        if ($notTouching) {
                            $ropePos[$piece][1] += ($diff[1] > 0) ? 1 : (($diff[1] < 0) ? -1 : 0);
                            $ropePos[$piece][0] += ($diff[0] > 0) ? 1 : (($diff[0] < 0) ? -1 : 0);
                            if ($piece == $ropeSize - 1) {
                                $seen[] = $ropePos[$piece];
                            }
                        }
                    }
                }
            }
        }

        $seen = array_unique($seen, SORT_REGULAR);
        return sizeof($seen);
    }

    private function initializeGrid()
    {
        $grid = (array)null;
        for ($i = -5; $i < 5; $i++) {
            $row = (array)null;
            for ($j = -5; $j < 6; $j++) {
                $row[$j] = false;
            }
            $grid[$i] = $row;
        }

        return $grid;
    }

    private function drawMap($grid, $head, $tail, $drawRope = true)
    {
        $passed = 0;
        for ($i = 4; $i >= -5; $i--) {
            for ($j = -5; $j < 5; $j++) {
//                var_dump($head);
                if ($drawRope && ($head[0] == $i) && ($head[1] == $j)) {
                    print('H');
                } elseif ($drawRope && ($tail[0] == $i) && ($tail[1] == $j)) {
                    print('T');
                } elseif ($grid[$i][$j] == true) {
                    $passed++;
                    print('#');
                } else {
                    print('.');
                }
            }
            print("\n");
        }
        print("\n");
        return $passed;
    }

}