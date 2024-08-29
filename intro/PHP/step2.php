<?php

declare(strict_types=1);
//On crée une classe 'beverage'
class beverage {

    //On lui attribue des propriétés
    public $color;
    public $price;
    public $temperature;

    //Dans le constructeur, on définit le type de ces propriétés (l.11) et on les "imprime" sur l'objet à créer (l.14 à 16)
    public function __construct(string $color, float $price, string $temperature='cold')
    {
        $this->color=$color;
        $this->price=$price;
        $this->temperature=$temperature;
    }
}
//On crée une classe 'beer', héritant des propriétés de la classe 'beverage'
class beer extends beverage {
    //On lui attribue deux nouvelles propriétés
    public $name;
    public $alcoholPercentage;
    //On crée un nouveau constructeur en n'oubliant pas de réinscrire à la fin des nouveaux arguments les arguments du premier constructeur qui nous intéressent
    public function __construct(string $name, float $alcoholPercentage, string $color, float $price, string $temperature='cold')
    //On précise ici le lien d'héritage entre beverage et beer en respectant bien l'ordre d'inscription des arguments
    {parent:: __construct($color, $price, $temperature);
        $this->name=$name;
        $this->alcoholPercentage=$alcoholPercentage;
    }
}
//On crée une fonction qui va afficher un message contenant le taux d'alcool de l'objet sortant du constructeur beer
function getAlcoholPercentage($beer) {
    //Le taux d'alcool affiché sera celui de l'objet sortant du constructeur beer
    return "This drink's alcohol percentage is ".$beer->alcoholPercentage."%\n";
}

$duvel = new beer('Duvel', 8.5, 'blond', 3.5);
echo getAlcoholPercentage($duvel);
print_r($duvel);
//On crée une fonction qui print un message, et prenant pour argument dans l'absolu une variable $beverage
function getInfo($beverage) {
    //Les infos récupérées ici seront celles imprimées sur l'objet de classe beverage à sa sortie du constructeur.
    //Si la propriété name n'est pas vide, alors le premier message s'affiche.
    if (!empty($beverage->name)){
    return $beverage->name." - This beverage is " .$beverage->temperature. " and " .$beverage->color. ". Its price is " .$beverage->price. " euros.\n";
    }
    //Sinon, ce message s'affiche.
    else{  
    return "This beverage is " .$beverage->temperature. " and " .$beverage->color. ". Its price is " .$beverage->price. " euros.\n";
    }
}

echo getInfo($duvel);

//On instancie un nouvel objet de classe beverage, en lui attribuant une couleur et un prix.
$cola = new beverage('black', 2);
//On appelle la fonction getInfo, prenant cette fois-ci pour argument l'objet $cola créé juste au-dessus.
echo getInfo($cola);

//Cela affichera le message suivant: 'This beverage is cold and black. Its price is 2 euros.'