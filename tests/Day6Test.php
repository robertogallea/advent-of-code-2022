<?php

namespace Tests;



use Robertogallea\AdventOfCode2022\Day6;

class Day6Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day6())->execute($data);

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

        $result = (new Day6())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ .'/data/day6_example.txt', 7],
            [__DIR__ .'/data/day6_1.txt', 1155],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ .'/data/day6_example.txt', 19],
            [__DIR__ .'/data/day6_2.txt', 2789],
        ];
    }
}