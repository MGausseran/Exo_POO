<?php

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

//Ensuite, on crée une fonction qui print un message, et prenant pour argument dans l'absolu une variable $beverage
function getInfo($beverage) {
    //Les infos récupérées ici seront celles imprimées sur l'objet de classe beverage à sa sortie du constructeur
    return "This beverage is " .$beverage->temperature. " and " .$beverage->color. ". Its price is " .$beverage->price. " euros.";
}

//On instancie un nouvel objet de classe beverage, en lui attribuant une couleur et un prix.
$cola = new beverage('black', 2);
//Enfin, on appelle la fonction getInfo, prenant cette fois-ci pour argument l'objet $cola créé juste au-dessus.
echo getInfo($cola);

//Cela affichera le message suivant: 'This beverage is cold and black. Its price is 2 euros.'