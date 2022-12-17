<?php

namespace Tests;



use Robertogallea\AdventOfCode2022\Day10;

class Day10Test extends TestCase
{

    /**
     * @test
     *
     * @dataProvider data_example1
     */
    public function it_works_example_1($filename, $answer)
    {
        $data = file_get_contents($filename);

        $result = (new Day10())->execute($data);

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

        $result = (new Day10())->execute2($data);

        $this->assertEquals($answer, $result);
    }

    public function data_example1()
    {
        return [
            [__DIR__ . '/data/day10_example.txt', 13140],
            [__DIR__ .'/data/day10_1.txt', 17020],
        ];
    }

    public function data_example2()
    {
        return [
            [__DIR__ . '/data/day10_example.txt', "##..##..##..##..##..##..##..##..##..##..
###...###...###...###...###...###...###.
####....####....####....####....####....
#####.....#####.....#####.....#####.....
######......######......######......####
#######.......#######.......#######.....
"],
            [__DIR__ .'/data/day10_2.txt', "###..#....####.####.####.#.....##..####.
#..#.#....#.......#.#....#....#..#.#....
#..#.#....###....#..###..#....#....###..
###..#....#.....#...#....#....#.##.#....
#.#..#....#....#....#....#....#..#.#....
#..#.####.####.####.#....####..###.####.
"],
        ];
    }
}