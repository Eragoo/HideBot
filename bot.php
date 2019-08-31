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

function helpi($telegram, $text)
{
    if (empty($text))
    {
        $answer = "kek";
        $telegram->sendMessage(490271399, $answer);
    }else{
        $answer = "Your message - ". $text;
        $telegram->sendMessage(490271399, $answer);
    }

}

function chooseMethod($command, $telegram, $text)
{
    switch ($command){
        case "/helpi":
            helpi($telegram, $text);
            break;

    }

}


$storage = new Storage();
$telegram = new TelegramBot();

$message = $telegram->getMessage();
$command = $message->getCommand();
$text = $message->getParams($command);

if (empty($command)){
    $command = $storage->restoreCommand($message->getChat()->getId());
}

$storage->storeCommand($message->getChat()->getId(), $command);

chooseMethod($command, $telegram, $text);



