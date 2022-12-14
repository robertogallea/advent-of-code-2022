<?php

namespace Tests;



use Robertogallea\AdventOfCode2022\Day7;

class Day7Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day7())->execute($data);

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

        $result = (new Day7())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ .'/data/day7_example.txt', 95437],
            [__DIR__ .'/data/day7_1.txt', 1543140],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ .'/data/day7_example.txt', 24933642],
            [__DIR__ .'/data/day7_2.txt', 1117448],
        ];
    }
}