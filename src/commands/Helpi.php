<?php
namespace yevheniikukhol\HideBot\commands;
include ("src/interfaces/Command_interface.php");
use yevheniikukhol\HideBot\interfaces\Command_interface;

class Helpi implements Command_interface
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $answer = "kek";
            $telegram->sendMessage($chat_id, $answer);
        }else{
            $answer = "Your message - ". $text;
            $telegram->sendMessage($chat_id, $answer);
        }

    }
}