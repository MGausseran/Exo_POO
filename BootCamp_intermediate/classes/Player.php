<?php

class Player
{   public $name;
    public $score;
    public function __construct(string $name, int $score)
    {
    $this->name=$name." 👤";
    $this->score=$score;
    }
}
