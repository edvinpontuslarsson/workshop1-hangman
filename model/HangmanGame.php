<?php

class HangmanGame {
    public function runGame() {
        if (!isset($_SESSION["randomWord"]) && empty($_SESSION["randomWord"])) {
            $this->generateRandomWord();
        }

        $secretWord = $this->makeWordSecret($_SESSION["randomWord"]);
        return $_SESSION['randomWord'];
    }

    public function generateRandomWord() {
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
        $_SESSION["randomWord"] = $word;
        $_SESSION["resultWord"] = makeWordSecret($word);
    }

    // Add stars instead of showing the correct character.
    public function makeWordSecret($word) {
        $splitWord = str_split($word);

        $secretWord = '';

        foreach ($splitWord as $word) {
            $secretWord .= '*';
        }

        return $secretWord;
    }

    // TODO: Compare guessed letter with the random word.
    public function compareGuessedLetter($letter) {
        $word = str_split($_SESSION["randomWord"]);
        for ($i = 0; $i < count($word); $i++) {
            if ($word[$i] == strtolower($letter)) {
                $word[$i] = $letter;
            }
            // ändra session till $word
        }
        return 'You guessed : ' . $letter;
    }

}
