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

    function getColor(): string {
        return $this->color;
    }

    function getPrice(): float {
        return $this->price;
    }

    function getTemperature(): string {
        return $this->temperature;
    }
}
//On crée une classe 'beer', héritant des propriétés de la classe 'beverage'
class beer extends beverage {
    //On lui attribue deux nouvelles propriétés
    private $name;
    private $alcoholPercentage;
    //On crée un nouveau constructeur en n'oubliant pas de réinscrire à la fin des nouveaux arguments les arguments du premier constructeur qui nous intéressent
    public function __construct(string $name, float $alcoholPercentage, string $color, float $price, string $temperature='cold')
    //On précise ici le lien d'héritage entre beverage et beer en respectant bien l'ordre d'inscription des arguments
    {parent:: __construct($color, $price, $temperature);
        $this->name=$name;
        $this->alcoholPercentage=$alcoholPercentage;
    }

    function getName(): string{
        return $this->name;
    }

    function getAlcoholPercentage():float{
        return $this->alcoholPercentage;
    }

    private function beerInfo() {
        return "Hi i'm " .$beer.getName(). " and have an alcochol percentage of " .$beer.getAlcoholPercentage() . " and I have a " .$beer.getColor(). "color."
    }
}
//On crée une fonction qui va afficher un message contenant le taux d'alcool de l'objet sortant du constructeur beer
function getAlcoholPercentage(Beer $beer) :string {
    //Le taux d'alcool affiché sera celui de l'objet sortant du constructeur beer
    return "This drink's alcohol percentage is ".$beer->getAlcoholPercentage()."%\n";
}

$duvel = new beer('Duvel', 8.5, 'light', 3.5);
echo getAlcoholPercentage($duvel);
print_r($duvel);
//On crée une fonction qui print un message, et prenant pour argument dans l'absolu une variable $beverage
function getInfo($beverage) {
    //Les infos récupérées ici seront celles imprimées sur l'objet de classe beverage à sa sortie du constructeur.
    //Si la propriété name n'est pas vide, alors le premier message s'affiche.{
    return $beverage->getName()." - This beverage is " .$beverage->getTemperature(). " and " .$beverage->getColor(). ". Its price is " .$beverage->getPrice(). " euros.\n";
    }


echo getInfo($duvel);

//Cela affichera le message suivant: 'This beverage is cold and black. Its price is 2 euros.'