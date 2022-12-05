<?php

namespace Tests;

use Robertogallea\AdventOfCode2022\Day3;

class Day3Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day3())->execute($data);

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

        $result = (new Day3())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ .'/data/day3_example.txt', 157],
            [__DIR__ .'/data/day3_1.txt', 7691],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ .'/data/day3_example.txt', 70],
            [__DIR__ .'/data/day3_2.txt', 2508],
        ];
    }
}