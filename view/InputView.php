<?php

class InputView
{

    public function getHTML()
    {
        return
            '
        <form method="POST">
        <input type="text" name="guessedLetter">
        <input type="submit" value="Guess!">
        </form>
        ';
    }

}