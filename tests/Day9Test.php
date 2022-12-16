<?php

namespace Tests;



use Robertogallea\AdventOfCode2022\Day9;

class Day9Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day9())->execute($data);

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

        $result = (new Day9())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ . '/data/day9_example1.txt', 13],
            [__DIR__ .'/data/day9_1.txt', 6332],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ . '/data/day9_example1.txt', 1],
            [__DIR__ . '/data/day9_example2.txt', 36],
            [__DIR__ .'/data/day9_2.txt', 2511],
        ];
    }
}