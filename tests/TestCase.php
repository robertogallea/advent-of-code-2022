<?php

namespace Tests;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     *
     * @dataProvider data_example1
     */
    abstract public function it_works_example_1($filename, $answer);

    /**
     * @test
     *
     * @dataProvider data_example2
     */
    abstract public function it_works_example_2($filename, $answer);

    abstract public function data_example1();
    abstract public function data_example2();
}