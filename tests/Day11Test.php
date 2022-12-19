<?php

namespace Tests;



use Robertogallea\AdventOfCode2022\Day11;

class Day11Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day11())->execute($data);

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

        $result = (new Day11())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ . '/data/day11_example.txt', 10605],
            [__DIR__ .'/data/day11_1.txt', 54054],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ . '/data/day11_example.txt', 2713310158],
            [__DIR__ .'/data/day11_1.txt', 14314925001],
        ];
    }
}