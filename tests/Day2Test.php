<?php

namespace Tests;

use Robertogallea\AdventOfCode2022\Day1;
use Robertogallea\AdventOfCode2022\Day2;

class Day2Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day2())->execute($data);

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

        $result = (new Day2())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ .'/data/day2_example.txt', 15],
            [__DIR__ .'/data/day2_1.txt', 13446],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ .'/data/day2_example.txt', 12],
            [__DIR__ .'/data/day2_2.txt', 13509],
        ];
    }
}