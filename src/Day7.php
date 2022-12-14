<?php

namespace Robertogallea\AdventOfCode2022;

class Day7 extends Day
{

    public function execute(string $data)
    {
        $sizes = $this->computeSizes($data);

        $result = 0;

        foreach ($sizes as $size) {
            if ($size <= 100000) {
                $result += $size;
            }
        }

        return $result;

    }

    public function execute2(string $data)
    {
        $sizes = $this->computeSizes($data);

        $potentialDirSizes = [];

        $freeSpace = 70000000 - $sizes['/'];
        foreach ($sizes as $size) {
            if ($freeSpace + $size >= 30000000) {
                $potentialDirSizes[] = $size;
            }
        }

        return min($potentialDirSizes);

    }

    private function getSize(mixed $item, $dirs)
    {
        if (is_numeric($item)) {
            return $item;
        }

        $size = 0;
        foreach ($dirs[$item] as $subitem) {
            $size += $this->getSize($subitem, $dirs);
        }
        return $size;

        return $this->getSize($dirs[$item], $dirs);
    }

    /**
     * @param string $data
     */
    public function computeSizes(string $data)
    {
        $lines = preg_split("/\r\n|\n|\r/", $data);

        $stack = [];

        foreach ($lines as $line) {
            $tokens = explode(' ', $line);

            if ($tokens[0] == '$') {
                if ($tokens[1] == 'cd') {
                    if ($tokens[2] != '..') {
                        array_push($stack, $tokens[2]);
                        $dirs[implode('/', $stack)] = [];
                    } else {
                        array_pop($stack);
                    }
                } elseif ($tokens[0] == 'ls') {
                }
            } elseif ($tokens[0] == 'dir') {
                $dirs[implode('/', $stack)][] = implode('/', $stack) . '/' . $tokens[1];
            } else {
                $dirs[implode('/', $stack)][] = $tokens[0];
            }

        }

        foreach ($dirs as $key => $dir) {
            $sizes[$key] = 0;
            foreach ($dir as $item) {
                $sizes[$key] += $this->getSize($item, $dirs);
            }
        }

        return $sizes;
    }


}