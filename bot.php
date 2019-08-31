<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once "src/classes/TelegramBot.php";

include ('src/classes/Chat.php');
include ('src/classes/Message.php');
include ('src/classes/Storage.php');
include ('src/classes/DB.php');
include ('src/classes/Commands.php');


use yevheniikukhol\HideBot\classes\Storage;
use yevheniikukhol\HideBot\classes\TelegramBot;
use yevheniikukhol\HideBot\classes\DB;
use yevheniikukhol\HideBot\classes\Commands;


$storage = new Storage();
$telegram = new TelegramBot();

$message = $telegram->getMessage();
$command = $message->getCommand();
$text = $message->getParams($command);

if (empty($command)){
    $command = $storage->restoreCommand($message->getChat()->getId());
}

$storage->storeCommand($message->getChat()->getId(), $command);

Commands::chooseCommand($command, $telegram, $text);




