<?php

class LayoutView
{

    private $inputView;
    private $hangmanGame;

    public function __construct($inputView, $hangmanGame)
    {
        $this->inputView = $inputView;
        $this->hangmanGame = $hangmanGame;
    }

    public function renderHTML()
    {
        // TODO: Move to own function.
        $this->getGuessedLetter();

        echo
            '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Hangman Game</title>
        </head>
        <body>
        <p>Enter a letter and start guessing.</p>
        ' . $this->inputView->getHTML() . '
        <br>
        ' . $this->hangmanGame->generateRandomWord() . '
        </body>
        </html>';
    }

    public function getGuessedLetter()
    {
        if (isset($_POST["guessedLetter"])) {
            $this->hangmanGame->compareGuessedLetter($_POST["guessedLetter"]);
        }
    }

}