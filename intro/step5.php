<?php

declare(strict_types=1);
//On crée une classe 'beverage'
class beverage {

    //On lui attribue des propriétés
    private $color;
    private $price;
    private $temperature;

    

    //Dans le constructeur, on définit le type de ces propriétés (l.11) et on les "imprime" sur l'objet à créer (l.14 à 16)
    public function __construct(string $color, float $price, string $temperature='cold')
    {
        $this->color=$color;
        $this->price=$price;
        $this->temperature=$temperature;
    }

    function printInfo()
    {
        echo "This beer price is {$this->price} euros.\n";
    }

    function changePrice($newPrice)
    {
$this->price = $newPrice;
    }
}

$duvel = new beverage('blond', 3.5);
$duvel->changePrice(6.0);
$duvel->printInfo();
print_r($duvel);