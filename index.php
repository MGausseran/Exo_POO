<?php

declare(strict_types=1);

ini_set(option: 'display_errors', value: '1');
ini_set(option: 'display_startup_errors', value: '1');
error_reporting(error_level: E_ALL);

require_once 'classes/Data.php';
require_once 'classes/LanguageGame.php';
require_once 'classes/Word.php';
require_once 'classes/Player.php';
session_start();

$game = new classes\LanguageGame();
$game->run();

require 'view.php';