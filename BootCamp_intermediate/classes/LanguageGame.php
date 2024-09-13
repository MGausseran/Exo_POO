<?php

namespace Classes;

class LanguageGame
{
    public function run(): void
    {
        if (!isset($_SESSION['player'])) {
            if (isset($_POST['nickname'])) {
                $_SESSION['player'] = serialize(new Player($_POST['nickname']));
                $this->initializeGame();
            }
        } else {
            if (isset($_POST['answer'])) {
                $this->checkAnswer($_POST['answer']);
            } else {
                if (!isset($_SESSION['current_word'])) {
                    $this->generateNewWord();
                }
            }
        }

        if (isset($_POST['reset'])) {
            $this->resetGame();
        }
    }

    private function initializeGame(): void
    {
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
        $player = unserialize($_SESSION['player']); 
        $currentWord = unserialize($_SESSION['current_word']);

        if ($currentWord->verify($answer)) {
            $_SESSION['result_message'] = "Correct! The translation of '" . $currentWord->getWord() . "' is indeed '" . $answer . "'.";
            $player->increaseCorrect();
        } else {
            $_SESSION['result_message'] = "Incorrect! The correct translation of '" . $currentWord->getWord() . "' is '" . $currentWord->getAnswer() . "'.";
            $player->increaseIncorrect();
        }

        $_SESSION['player'] = serialize($player);

 
        if ($player->getScore()['correct'] >= 10 || $player->getScore()['incorrect'] >= 10) {
            $_SESSION['game_over'] = true;
        } else {
            $this->generateNewWord(); 
        }
    }

    private function resetGame(): void
    {
        session_destroy();
        session_start();
    }
}
