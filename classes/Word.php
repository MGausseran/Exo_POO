<?php

namespace Classes;

use Classes\Data;
class Word
{
    private $word;
    private $answer;

    public function __construct()
    {
        $words = Data::words();
        $this->word = array_rand($words);
        $this->answer = $words[$this->word];
    }

    public function getWord(): string
    {
        return $this->word;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function verify(string $proposal): bool
    {
        $proposal = strtolower($proposal);
        $answer = strtolower($this->answer);
        return ($proposal === $answer || $this->marginOfError($proposal, $answer));
    }

    private function marginOfError($proposal, $answer): bool
    {
        $margin = 1;
        return levenshtein($proposal, $answer) <= $margin;
    }
}