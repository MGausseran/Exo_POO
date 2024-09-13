<?php

namespace Classes;

class Player
{
    public $name;
    public $score;

    public function __construct(string $name)
    {
        $this->name = $name . " 👤";
        $this->score = [
            'correct' => 0,
            'incorrect' => 0
        ];
    }

    public function increaseCorrect(): void
    {
        $this->score['correct']++;
    }

    public function increaseIncorrect(): void
    {
        $this->score['incorrect']++;
    }

    public function getScore(): array
    {
        return $this->score;
    }

    public function resetScore(): void
    {
        $this->score = [
            'correct' => 0,
            'incorrect' => 0
        ];
    }
}