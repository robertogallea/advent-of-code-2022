<?php

namespace Robertogallea\AdventOfCode2022;

class Day10 extends Day
{
    const NOOP = 'noop';
    const ADDX = 'addx';
    const CYCLE_LEN = [
        self::NOOP => 1,
        self::ADDX => 2,
    ];

    public function execute(string $data)
    {
        $x = 1;

        $lines = preg_split("/\r\n|\n|\r/", $data);
        $cycles[] = $x;
        foreach ($lines as $line) {
            if ($line != '') {
                $cmd = explode(' ', $line);
                for ($i = 0; $i < self::CYCLE_LEN[$cmd[0]]; $i++) {
                    $cycles[] = $x;
                    print("\n\n");
                }
                switch ($cmd[0]) {
                    case self::NOOP:
                        break;
                    case self::ADDX:
                        $x += $cmd[1];
                        break;
                }
            }
        }

        $total = 0;
        for ($i = 20; $i <= 220; $i += 40) {
            print(sprintf("%d:\t%d\t%d\n", $i, $cycles[$i], $i * $cycles[$i]));
            $total += $cycles[$i] * $i;
        }
        return $total;
    }


    public function execute2(string $data)
    {
        $x = 1;
        $crt = [];
        for ($i = 0; $i < 6; $i++) {
            $row = [];
            for ($j = 0; $j < 40; $j++) {
                $row[$j] = '_';
            }
            $crt[$i] = $row;
        }

        $lines = preg_split("/\r\n|\n|\r/", $data);

        $cycle = 0;

        foreach ($lines as $line) {
            if ($line != '') {
                $cmd = explode(' ', $line);
                for ($i = 0; $i < self::CYCLE_LEN[$cmd[0]]; $i++) {
                    if ((($cycle % 40)  >= $x-1) && (($cycle % 40)  <= $x+1)) {
                        $crt[$cycle / 40 ][($cycle % 40)] = '#';
                    } else {
                        $crt[$cycle / 40 ][($cycle % 40) ] = '.';
                    }

                    print('x: ' . $x . "\n");
                    print(sprintf("Start cycle\t%d: begin executing %s\n",$cycle+1,$line));
                    $cycle++;
                    $this->drawScreen($crt);
                }
                if ($cmd[0] == self::ADDX) {
                    $x += $cmd[1];
                }
                print(sprintf("End of cycle\t%d: finish executing %s (Register x is now %d)\n", $cycle, $line, $x));
            }

        }

        return $this->drawScreen($crt);
    }

    private function drawScreen(array $crt)
    {
        $res = '';
        for ($i = 0; $i < 6; $i++) {
            for ($j = 0; $j < 40; $j++) {
                $res .= $crt[$i][$j];
            }
            $res .= "\n";
        }
        print($res);

        return $res;
    }
}