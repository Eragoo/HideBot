<?php
namespace yevheniikukhol\HideBot\commands;

require_once ('src/commands/Command.php');

class Def extends Command
{
    public static function start($telegram, $text)
    {
        $chat_id = $telegram->getMessage()->getChat()->getId();

        if (empty($text))
        {
            $name = $telegram->getUser()->getName();
            $telegram->sendMessage($chat_id, 'Your name is : '.$name);
        }else{

            $answer = "You write me : ". $text;
            $telegram->sendMessage($chat_id, $answer);

        }
    }
}