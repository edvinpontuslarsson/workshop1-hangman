<?php
session_start();

// Including required files.
require_once('view/LayoutView.php');
require_once('view/InputView.php');
require_once('model/HangmanGame.php');

// For test purpose to generate new word on reload.
//unset($_SESSION['randomWord']);

// Initialize objects.
$hangmanGame = new HangmanGame();
$inputView = new InputView();

// Injecting HangmanGame model.
$layoutView = new LayoutView($inputView, $hangmanGame);

$layoutView->renderHTML();
