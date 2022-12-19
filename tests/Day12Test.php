<?php

namespace Tests;



use Robertogallea\AdventOfCode2022\Day12;

class Day12Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day12())->execute($data);

        $this->assertEquals($answer, $result);
    }

    /**
     * @test
     *
     * @dataProvider data_example2
     */
    public function it_works_example_2($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day12())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ . '/data/day12_example.txt', 31],
            [__DIR__ .'/data/day12_1.txt', 412],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ . '/data/day12_example.txt', 29],
            [__DIR__ .'/data/day12_1.txt', 402],
        ];
    }
}