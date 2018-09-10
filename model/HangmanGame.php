<?php

class HangmanGame
{
    
    public function generateRandomWord()
    {
        $filename = "words.txt";

        $wordsFromFile = file($filename);
        $words = [];

        foreach ($wordsFromFile as $word) {
            array_push($words, $word);
        }

        // Pick a random word from words.txt.
        $maxWordIndex = count($words);
        $minWordIndex = 0;
        $random = rand($minWordIndex, $maxWordIndex - 1);
        $word = $words[$random];

        // Save random word to session.
        if (!isset($_SESSION["randomWord"]) && empty($_SESSION["randomWord"])) {
            $_SESSION["randomWord"] = $word;
        }

        $secretWord = $this->makeWordSecret($_SESSION["randomWord"]);

        return $secretWord;
    }

    // Add stars instead of showing the correct character.
    public function makeWordSecret($word)
    {
        $splitWord = str_split($word);

        $secretWord = '';

        foreach ($splitWord as $word) {
            $secretWord .= '*';
        }

        return $secretWord;
    }

    // TODO: Compare guessed letter with the random word.
    // TODO: Return value.
    public function compareGuessedLetter($letter)
    {
        echo 'You guessed : ' . $letter;
    }

}