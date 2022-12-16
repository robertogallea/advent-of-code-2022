<?php

namespace Tests;



use Robertogallea\AdventOfCode2022\Day8;

class Day8Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day8())->execute($data);

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

        $result = (new Day8())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ .'/data/day8_example.txt', 21],
            [__DIR__ .'/data/day8_1.txt', 1859],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ .'/data/day8_example.txt', 8],
            [__DIR__ .'/data/day8_2.txt', 332640],
        ];
    }
}