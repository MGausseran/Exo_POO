<?php

namespace Classes;

class Word
{
    private $word;
    private $answer;

    public function __construct()
    {
        //On stocke dans $words le tableau de mots récupéré par l'appel de la méthode words() de la classe Data
        $words = Data::words();
        //Array_rand sélectionne au hasard une clé dans l'array $words
        $this->word = array_rand($words);
        $this->answer = $words[$this->word]; //On récupère la traduction en anglais
    }

    public function getWord(): string //La propriété $word étant private, il faut avoir recours à un Getter pour pouvoir y accèder 
    {
        return $this->word;
    }

    private function marginOfError($proposal, $answer) { //On va calculer une marge d'erreur pour que le jeu tolère une marge d'erreur d'une typo

        $margin = 1;
        //levenshtein prend en argument deux strings et va déterminer sur base de $margin à partir de cb lettres de différence ces deux strings peuvent être considérées
        //comme semblables ou différentes
        $reference = levenshtein($proposal,$answer);
        //si l'écart levenshtein est égal ou inférieur à une lettre d'erreur, alors on accepte le mot
        if ($reference <= $margin) {
            return true;
        }
        else {
            return false;
        }
        
    }

    public function verify(string $proposal): bool //On va vérifier si la proposition du joueur est bonne
    {   $proposal = strtolower($proposal); //Par souci de praticité, on convertit automatiquement la proposition et la bonne réponse en minuscule pour éviter un conflit de correspondance de strings
        $answer = strtolower($this->answer);
        //Si la proposition est STRICTEMENT égale à la bonne réponse, ou qu'elle varie d'une lettre, alors la proposition est validée
        if ($proposal === $answer || $this->marginOfError($proposal, $answer)) {
        
            return true;
    
        }
        return false;
    }
}
