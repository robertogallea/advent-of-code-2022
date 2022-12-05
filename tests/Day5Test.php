<?php

namespace Tests;



use Robertogallea\AdventOfCode2022\Day5;

class Day5Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day5())->execute($data);

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

        $result = (new Day5())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ .'/data/day5_example.txt', 'CMZ'],
            [__DIR__ .'/data/day5_1.txt', 'RNZLFZSJH'],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ .'/data/day5_example.txt', 'MCD'],
            [__DIR__ .'/data/day5_2.txt', 'CNSFCGJSM'],
        ];
    }
}