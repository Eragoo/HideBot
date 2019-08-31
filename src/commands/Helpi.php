<?php
namespace yevheniikukhol\HideBot\commands;

require_once ('src/commands/Command.php');

class Helpi extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $answer = 'lol';
            $telegram->sendMessage($chat_id, $answer);
        }else{
            $answer = "Your message - ". $text;
            $telegram->sendMessage($chat_id, $answer);

        }

    }
}