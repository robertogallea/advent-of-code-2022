<?php

namespace Tests;


use Robertogallea\AdventOfCode2022\Day4;

class Day4Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day4())->execute($data);

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

        $result = (new Day4())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ .'/data/day4_example.txt', 2],
            [__DIR__ .'/data/day4_1.txt', 526],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ .'/data/day4_example.txt', 4],
            [__DIR__ .'/data/day4_2.txt', 886],
        ];
    }
}