<?php

namespace Tests;

use Robertogallea\AdventOfCode2022\Day1;

class Day1Test extends TestCase
{
    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day1())->execute($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ .'/data/day1_example.txt', 24000],
            [__DIR__ .'/data/day1_1.txt', 74198],
        ];
    }

    /**
     * @test
     *
     * @dataProvider data_example2
     */
    public function it_works_example_2($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day1())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example2()
    {
        return [
            [__DIR__ .'/data/day1_example.txt', 45000],
            [__DIR__ .'/data/day1_1.txt', 209914],
        ];
    }
}