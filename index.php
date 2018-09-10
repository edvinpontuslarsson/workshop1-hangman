<?php
session_start();

// Including required files.
require_once('view/LayoutView.php');
require_once('view/InputView.php');
require_once('model/HangmanGame.php');

// Initialize objects.
$hangmanGame = new HangmanGame();
$inputView = new InputView();

// Injecting HangmanGame model.
$layoutView = new LayoutView($inputView, $hangmanGame);

$layoutView->renderHTML();
