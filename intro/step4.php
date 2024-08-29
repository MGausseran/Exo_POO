<?php

declare(strict_types=1);
class beverage
{

    protected $color;
    protected $price;
    protected $temperature;

    public function __construct(string $color, float $price, string $temperature = 'cold')
    {
        $this->color = $color;
        $this->price = $price;
        $this->temperature = $temperature;
    }

    function getColor(): string
    {
        return $this->color;
    }

    function getPrice(): float
    {
        return $this->price;
    }

    function getTemperature(): string
    {
        return $this->temperature;
    }
}
class beer extends beverage
{
    protected $name;
    protected $alcoholPercentage;
    public function __construct(string $name, float $alcoholPercentage, string $color, float $price, string $temperature = 'cold')
    {
        parent::__construct($color, $price, $temperature);
        $this->name = $name;
        $this->alcoholPercentage = $alcoholPercentage;
    }

    private function beerInfo(): string
    {
        return "Hi i'm " . $this->name . " and have an alcochol percentage of " . $this->alcoholPercentage . " and I have a " . $this->color . " color.\n";
    }

    function displayBeerInfo(): string
    {
        return $this->beerInfo();
    }

    function getAlcoholPercentage(): string
    {
        return "This drink's alcohol percentage is " . $this->alcoholPercentage . "%\n";
    }

    function getInfo(): string
    {
        return $this->name . " - This beverage is " . $this->temperature . " and " . $this->color . ". Its price is " . $this->price . " euros.\n";
    }
}

$duvel = new beer('Duvel', 8.5, 'light', 3.5);
echo $duvel->getAlcoholPercentage();
echo $duvel->displayBeerInfo();
print_r($duvel);
