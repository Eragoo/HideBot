<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once "src/classes/TelegramBot.php";

include ('src/classes/Chat.php');
include ('src/classes/Message.php');
include ('src/classes/Storage.php');
include ('src/classes/DB.php');

use yevheniikukhol\HideBot\classes\Storage;
use yevheniikukhol\HideBot\classes\TelegramBot;
use yevheniikukhol\HideBot\classes\DB;

$st = new Storage();

$r = $st->restoreCommand(24);

var_dump($r);




