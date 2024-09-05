<?php

namespace Classes;

class LanguageGame
{
    public function run(): void
    {
        // Si aucun joueur n'est défini, demander un pseudo
        if (!isset($_SESSION['player'])) {
            if (isset($_POST['nickname'])) {
                $_SESSION['player'] = serialize(new Player($_POST['nickname']));
                $this->initializeGame();
            }
        } else {
            // Si le jeu a déjà commencé, gérer les réponses
            if (isset($_POST['answer'])) {
                $this->checkAnswer($_POST['answer']);
            } else {
                // Générer un nouveau mot si nécessaire
                if (!isset($_SESSION['current_word'])) {
                    $this->generateNewWord();
                }
            }
        }

        // Gérer la réinitialisation
        if (isset($_POST['reset'])) {
            $this->resetGame();
        }
    }

    private function initializeGame(): void
    {
        // Générer un nouveau mot
        $this->generateNewWord();
    }

    private function generateNewWord(): void
    {
        $word = new Word();
        $_SESSION['current_word'] = serialize($word);
        $_SESSION['current_word_display'] = $word->getWord();
        unset($_SESSION['result_message']);
    }

    private function checkAnswer(string $answer): void
    {
        $player = unserialize($_SESSION['player']); // Récupérer l'objet Player
        $currentWord = unserialize($_SESSION['current_word']); // Récupérer le mot courant

        if ($currentWord->verify($answer)) {
            $_SESSION['result_message'] = "Correct! The translation of '" . $currentWord->getWord() . "' is indeed '" . $answer . "'.";
            $player->increaseCorrect();
        } else {
            $_SESSION['result_message'] = "Incorrect! The correct translation of '" . $currentWord->getWord() . "' is '" . $currentWord->getAnswer() . "'.";
            $player->increaseIncorrect();
        }

        // Enregistrer le joueur mis à jour dans la session
        $_SESSION['player'] = serialize($player);

        // Vérifier si le jeu est terminé
        if ($player->getScore()['correct'] >= 10 || $player->getScore()['incorrect'] >= 10) {
            $_SESSION['game_over'] = true;
        } else {
            $this->generateNewWord(); // Générer un nouveau mot
        }
    }

    private function resetGame(): void
    {
        session_destroy();
        session_start();
    }
}