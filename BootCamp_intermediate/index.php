<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'classes/Data.php';
require_once 'classes/LanguageGame.php';
require_once 'classes/Word.php';
require_once 'classes/Player.php';
session_start();

$game = new Classes\LanguageGame();
$game->run();

require 'view.php';