<?php

namespace Robertogallea\AdventOfCode2022;

class Day2 extends Day
{
    const ROCK = 'ROCK';
    const PAPER = 'PAPER';
    const SCISSORS = 'SCISSORS';

    const LOSE = 'LOSE';
    const DRAW = 'DRAW';
    const WIN = 'WIN';

    const OPPONENT_MOVES = [
        'A' => self::ROCK,
        'B' => self::PAPER,
        'C' => self::SCISSORS,
    ];

    const PLAYER_MOVES = [
        'X' => self::ROCK,
        'Y' => self::PAPER,
        'Z' => self::SCISSORS,
    ];

    const DESIRED_OUTCOME = [
        'X' => self::LOSE,
        'Y' => self::DRAW,
        'Z' => self::WIN,
    ];

    const OUTCOMES = [
        'X' => self::ROCK,
        'Y' => self::PAPER,
        'Z' => self::SCISSORS,
    ];

    const SCORES = [
        self::ROCK => 1,
        self::PAPER => 2,
        self::SCISSORS => 3,
    ];

    const DRAW_SCORE = 3;
    const WIN_SCORE = 6;

    public function execute(string $data)
    {
        $score = 0;

        $lines = preg_split("/\r\n|\n|\r/", $data);

        foreach ($lines as $line) {
            [$opponent, $player] = explode(' ', $line);
            $opponent = self::OPPONENT_MOVES[$opponent];
            $player = self::PLAYER_MOVES[$player];

            if ($opponent === $player) $score += self::SCORES[$player] + self::DRAW_SCORE;
            elseif (($opponent === self::ROCK) && ($player === self::PAPER)) $score += self::SCORES[$player] + self::WIN_SCORE;
            elseif (($opponent === self::ROCK) && ($player === self::SCISSORS)) $score += self::SCORES[$player];
            elseif (($opponent === self::PAPER) && ($player === self::ROCK)) $score += self::SCORES[$player];
            elseif (($opponent === self::PAPER) && ($player === self::SCISSORS)) $score += self::SCORES[$player] + self::WIN_SCORE;
            elseif (($opponent === self::SCISSORS) && ($player === self::ROCK)) $score += self::SCORES[$player] + self::WIN_SCORE;
            elseif (($opponent === self::SCISSORS) && ($player === self::PAPER)) $score += self::SCORES[$player];
        }
        return $score;
    }

    public function execute2(string $data)
    {
        $score = 0;

        $lines = preg_split("/\r\n|\n|\r/", $data);

        foreach ($lines as $line) {
            [$opponent, $outcome] = explode(' ', $line);
            $opponent = self::OPPONENT_MOVES[$opponent];
            $outcome = self::DESIRED_OUTCOME[$outcome];

            if (($opponent === self::ROCK) && ($outcome === self::LOSE)) $score += self::SCORES[self::SCISSORS];
            elseif (($opponent === self::ROCK) && ($outcome === self::DRAW)) $score += self::SCORES[self::ROCK] + self::DRAW_SCORE;
            elseif (($opponent === self::ROCK) && ($outcome === self::WIN)) $score += self::SCORES[self::PAPER] + self::WIN_SCORE;
            elseif (($opponent === self::PAPER) && ($outcome === self::LOSE)) $score += self::SCORES[self::ROCK];
            elseif (($opponent === self::PAPER) && ($outcome === self::DRAW)) $score += self::SCORES[self::PAPER] + self::DRAW_SCORE;
            elseif (($opponent === self::PAPER) && ($outcome === self::WIN)) $score += self::SCORES[self::SCISSORS] + self::WIN_SCORE;
            elseif (($opponent === self::SCISSORS) && ($outcome === self::LOSE)) $score += self::SCORES[self::PAPER];
            elseif (($opponent === self::SCISSORS) && ($outcome === self::DRAW)) $score += self::SCORES[self::SCISSORS] + self::DRAW_SCORE;
            elseif (($opponent === self::SCISSORS) && ($outcome === self::WIN)) $score += self::SCORES[self::ROCK] + self::WIN_SCORE;
        }
        return $score;
    }
}